<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdsController extends Controller
{
    public function __invoke(Request $request)
    {
        try {

            /*
            |--------------------------------------------------------------------------
            | STEP 1: VERIFY SIGNATURE
            |--------------------------------------------------------------------------
            */

            $payload = $request->getContent();

            // TODO: Replace with AppLixir's actual signature header name
            $receivedkey = $request->header('secretKey');


            // TODO: Store in config/services.php
            $secret = config('services.applixir.secret');

            // TODO: Replace with AppLixir's actual HMAC algorithm
            // $expectedSignature = hash_hmac(
            //     'sha256',
            //     $payload,
            //     $secret
            // );

            if (
                empty($receivedSignature)
                || ! hash_equals($expectedSignature, $receivedSignature)
            ) {
                Log::warning('Applixir webhook signature verification failed.', [
                    'ip' => $request->ip(),
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'Invalid signature',
                ], 403);
            }


            /*
            |--------------------------------------------------------------------------
            | STEP 2: PARSE PAYLOAD
            |--------------------------------------------------------------------------
            */

            $data = json_decode($payload, true);

            if (! is_array($data)) {

                Log::warning('Applixir webhook invalid JSON payload.');

                return response()->json([
                    'success' => false,
                    'message' => 'Invalid payload',
                ], 400);
            }


            /*
            |--------------------------------------------------------------------------
            | STEP 3: EXTRACT REQUIRED FIELDS
            |--------------------------------------------------------------------------
            |
            | Replace these keys with AppLixir's actual payload keys.
            |
            */

            $impressionId = $data['impressionId'] ?? null;

            $userId = $data['userId'] ?? null;

            $lessonId = $data['customData']['lessonId'] ?? null;

            if (
                empty($impressionId)
                || empty($userId)
            ) {
                Log::warning('Applixir webhook missing required fields.', [
                    'payload' => $data,
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'Missing required fields',
                ], 400);
            }


            /*
            |--------------------------------------------------------------------------
            | STEP 4: IDEMPOTENCY CHECK
            |--------------------------------------------------------------------------
            |
            | Prevent duplicate rewards.
            |
            */

            $alreadyProcessed = DB::table('applixir_impressions')
                ->where('impression_id', $impressionId)
                ->exists();

            if ($alreadyProcessed) {

                Log::info('Duplicate AppLixir impression ignored.', [
                    'impression_id' => $impressionId,
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Already processed',
                ], 200);
            }


            /*
            |--------------------------------------------------------------------------
            | STEP 5: ATOMIC REWARD GRANT
            |--------------------------------------------------------------------------
            */

            DB::transaction(function () use (
                $impressionId,
                $userId,
            ) {

                $user = User::find($userId);

                if (! $user) {
                    throw new \RuntimeException(
                        "User {$userId} not found."
                    );
                }
                else {

                    DB::table('users')
                        ->updateOrInsert(
                            [
                                'ads_to_play' => decrement(1),
                                'updated_at' => now(),
                            ]
                        )->where('id', $user->id);
                }

                /*
                |--------------------------------------------------------------------------
                | RECORD IMPRESSION
                |--------------------------------------------------------------------------
                |
                | Must happen inside transaction.
                |
                */

                DB::table('applixir_impressions')->insert([
                    'impression_id' => $impressionId,
                    'user_id' => $user->id,
                    'lesson_id' => $lessonId,
                    'payload' => json_encode($data),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            });


            /*
            |--------------------------------------------------------------------------
            | STEP 6: SUCCESS
            |--------------------------------------------------------------------------
            */

            Log::info('Applixir reward granted.', [
                'impression_id' => $impressionId,
                'user_id' => $userId,
                'lesson_id' => $lessonId,
            ]);

            return response()->json([
                'success' => true,
            ], 200);

        } catch (\Throwable $e) {

            Log::error('Applixir webhook failure.', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
            ], 500);
        }
    }
}
