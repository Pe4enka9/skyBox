<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Форма авторизации
     *
     * @return View
     */
    public function index(): View
    {
        return view('auth.login');
    }

    /**
     * Авторизация пользователя
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if (!Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            return back()->withErrors([
                'auth' => 'Неверный логин или пароль',
            ]);
        }

        return redirect()->intended(route('user.dashboard'));
    }
}
