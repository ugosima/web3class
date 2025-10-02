<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SetPasswordController extends Controller
{
   public function store(Request $request)
{
    $request->validate([
       'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    $user = $request->user();

    // If previously Google-only, update to hybrid
    if ($user->authcreatetype === 'google') 
        {
            $user->password = Hash::make($request->password);
            $user->authcreatetype = 'hybrid';
            $user->save();
            return back()->with('status', 'Password set');
    }
        else {
                return back()->with('error', 'Reset restricted');
        }

}

}
