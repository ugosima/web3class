<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Str;

class ReferralCodeService
{
    public static function generate(User $user): string
    {
        $prefix = strtoupper(substr($user->email, 0, 3));

        do {
            $code = $prefix . '-' . strtoupper(Str::random(6));
        } while (User::where('referral_code', $code)->exists());

        return $code;
    }
}

?>