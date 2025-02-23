<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /**
     * Форма регистрации
     *
     * @return View
     */
    public function index(): View
    {
        return view('auth.register');
    }

    /**
     * Регистрация пользователя
     *
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);

        /** @var User $user */
        $user = User::create($validated);

        Auth::login($user, true);

        return redirect()->route('index');
    }
}
