<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class AdsWatchController extends Controller
{
    public function __invoke(Request $request)
    {
        $userId = Auth::id();

        if (!$userId) {
            return response()->json([
                'error' => 'unauthenticated'
            ], 401);
        }

        $affected = DB::table('users')
            ->where('id', $userId)
            ->where('ads_to_play', '>', 0)
            ->decrement('ads_to_play');

        // fetch updated value if needed
        $adsToPlay = DB::table('users')
            ->where('id', $userId)
            ->value('ads_to_play');

        return response()->json([
            'success' => true,
            'ads_to_play' => $adsToPlay,
            'updated' => $affected > 0
        ]);
    }
}