<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Sessions;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;



class LoginController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    protected function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

        // $username_email = $request->input('username-email');
        // $password = $request->input('password');
        // $user = User::where(['username' => $username_email])
        //     ->orwhere(['email' => $username_email])->first();
        // if ($user && Hash::check($password, $user->password)) {
        //     $request->session()->put('user', $user);
        //     return view('index', [
        //         'user' => $user
        //     ]);
        // } else {
        //     return view('/login-register');
        // };
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $finduser = User::where('google_id', $user->id)->first();
        if (!empty($finduser)) {
            Auth::login($finduser);
            return redirect('/');
        } else {
            User::create([
                'fullname' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'avatar' => $user->avatar_original,
                'token' => Hash::make(Str::random(64)),
            ]);
            Auth::login($user);
            return redirect('/');
        }
    }
}
