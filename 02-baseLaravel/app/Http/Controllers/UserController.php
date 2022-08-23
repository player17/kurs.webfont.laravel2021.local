<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     *
     */
    public function create()
    {
        // Форма регистрации
        return view('user.create');
    }

    /**
     *
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        // Сохранение пользователя
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            // Хеширования пароля
            //'password' =>  $request->password,
            //'password' =>  Hash::make($request->password),
            'password' => bcrypt($request->password),
        ]);

        session()->flash('success', 'Пользователь зарегистрирован');
        // Авторизация пользователя
        Auth::login($user);

        // return redirect()->route('home')->with('success', 'Пользователь зарегистрирован');
        return redirect()->home();
    }
}
