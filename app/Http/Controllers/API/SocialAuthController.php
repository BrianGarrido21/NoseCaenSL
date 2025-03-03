<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToProvider() {
        return Socialite::driver('google')->redirect();
    }

    public function handleCallback() {
        try {
            $user = Socialite::driver('google')->user();
    
            $existingUser = Employee::where('email', $user->email)->first();
    
            if ($existingUser) {
                if (!$existingUser->google_id) {
                    $existingUser->update(['google_id' => $user->id]);
                }
                Auth::guard('employee')->login($existingUser, true);
            } else {
                $newUser = Employee::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                ]);
                Auth::guard('employee')->login($newUser, true);
            }
            
            return redirect()->route('employee.dashboard')->with('success', 'Login successful');
    
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Error logging in with Google: ' . $e->getMessage());
        }
    } 
}
