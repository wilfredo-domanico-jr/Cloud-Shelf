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

        // 1. Find or create social account
        $account = SocialAccount::where('provider', $provider)
            ->where('provider_id', $socialUser->getId())
            ->first();

        if ($account) {
            $user = $account->user;
        } else {

            // 2. Find or create user
            $user = User::firstOrCreate(
                ['email' => $socialUser->getEmail()],
                [
                    'name' => $socialUser->getName() ?? $socialUser->getNickname(),
                    'password' => bcrypt(Str::random(32)),
                ]
            );

            // 3. Create social account
            $account = $user->socialAccounts()->create([
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
                'avatar' => $socialUser->getAvatar(),
            ]);
        }

        // 4. ALWAYS activate current provider
        $user->socialAccounts()
            ->where('provider', $provider)
            ->update(['is_active' => true]);

        // 5. OPTIONAL: deactivate others
        $user->socialAccounts()
            ->where('provider', '!=', $provider)
            ->update(['is_active' => false]);

        Auth::login($user);

        return redirect()->route('home');
    }
}
