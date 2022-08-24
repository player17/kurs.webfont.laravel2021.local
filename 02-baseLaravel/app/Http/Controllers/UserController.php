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

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    /**
     *
     */
    public function loginForm()
    {
        return view('user.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Аутентификация после заполения формы входа
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            session()->flash('success', 'Авторизация прошла успешно');
            if(Auth::user()->is_admin) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->home();
            }
        }

        return redirect()->back()->with('error', 'Ошибка аутентификации');
    }
}
