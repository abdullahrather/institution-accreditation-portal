<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate(
            [
                'captcha' => 'required|captcha',
            ],
            [
                'captcha' => 'Incorrect captcha.',
            ]
        );

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('hei.view');
        }
        return back()->with('error', 'Incorrect email and password');
    }

    public function register()
    {
        return view('auth.register');   //->with($data);
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img('math')]);
    }

    public function registerPost(Request $request)
    {
        $checkEmail = User::where('email', $request->email)->first();
        if ($checkEmail) {
            return back()->with('error', 'Email already exists');
        }

        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
                'captcha' => 'required|captcha',
                'terms' => 'required'
            ],
            [
                'captcha' => 'Incorrect captcha. Please try again.',
            ]
        );

        $user = new User;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->save();

        $credentials = [
            'email' => $user->email,
            'password' => $request->password,
        ];

        Auth::attempt($credentials);

        return redirect()->route('hei.create')->with('success', 'Congratulations, account created please login for access');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
