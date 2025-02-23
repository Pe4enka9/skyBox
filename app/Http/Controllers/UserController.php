<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Файлы пользователя
     *
     * @return View
     */
    public function index(): View
    {
        /** @var File[] $files */
        $files = File::where('user_id', auth()->user()->id)->get();

        return view('user.dashboard', [
            'files' => $files,
        ]);
    }
}
