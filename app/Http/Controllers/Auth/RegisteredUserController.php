<?php

namespace App\Http\Controllers\Auth;
use Artisan;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\LoginSecurity;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use PragmaRX\Google2FAQRCode\Google2FA;
use PragmaRX\Google2FA\Google2FA as Google2FASupport;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        if(config('easyshortener.registration') == "true"){
            return view('auth.register');
            
        }else{
            return abort(404);
        }
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()->uncompromised()],
        ]);
        
        if(User::count() == null){

            Artisan::call('db:seed', [
                '--force' => true, // needed for production
                '--no-interaction' =>true, // prevent console confirmation
            ]);

            $user = User::create([
                'role_id' => '2', // set first created user as admin
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

        } else {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

        }

        $google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());
        $google2fasecret = $google2fa->generateSecretKey();

        $loginsecurity = LoginSecurity::create([
            'user_id' => $user->id,
            'google2fa_enable' => 'false',
            'google2fa_secret' => null,
        ]);

        Auth::login($user);

        return redirect('2fa/registerSecret');
        
    }
}
