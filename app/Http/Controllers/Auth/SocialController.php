<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect($provider)
    {

        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $socialUser = Socialite::driver($provider)->stateless()->user();

        if (!$socialUser->getEmail()) {
            return redirect()->route('login')
                ->with('error', 'Email is required from ' . ucfirst($provider));
        }

        // 1. Check if social account already exists
        $account = SocialAccount::where('provider', $provider)
            ->where('provider_id', $socialUser->getId())
            ->first();

        if ($account) {
            $user = $account->user;
        } else {

            // 2. Try find user by email
            $user = User::where('email', $socialUser->getEmail())->first();

            // 3. Create user if not exists
            if (!$user) {
                $user = User::create([
                    'name' => $socialUser->getName() ?? $socialUser->getNickname(),
                    'email' => $socialUser->getEmail(),
                    'password' => bcrypt(Str::random(32)),
                ]);
            }

            // 4. Attach social account
            $user->socialAccounts()->create([
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
                'avatar' => $socialUser->getAvatar(),
                'is_active' => true,

            ]);

            // ensure only current provider is active
            $user->socialAccounts()
                ->where('provider', '!=', $provider)
                ->update(['is_active' => false]);
        }

        Auth::login($user);

        return redirect()->route('home');
    }
}
