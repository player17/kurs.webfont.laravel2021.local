<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'min:3|required|confirmed',
            'avatar' => 'nullable|image',
        ]);
        //dd($request->all());

        // /storage/app/public/images/...
        // $avatar = $request->file('avatar')->store('images', 'public');
        if($request->hasFile('avatar')) {
            $folder = date('Y-m-d');
            $avatar = $request->file('avatar')->store('images/'.$folder);
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $avatar ?? null,
        ]);

        session()->flash('success', 'Successful registration');
        Auth::login($user);
        //return redirect()->home();
        return redirect()->route('home');
    }

    public function loginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->password,
        ])) {
            session()->flash('success', 'Successful auth');
            return redirect()->home();
        }

        //session()->flash('danger', 'Error auth');
        //return view('user.login');
        return redirect()->back()->with('danger', 'Incorrect login or password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
