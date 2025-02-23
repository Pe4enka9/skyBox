<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Models\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FileController extends Controller
{
    /**
     * Страница загрузки файлов
     *
     * @return View
     */
    public function uploadForm(): View
    {
        return view('user.upload');
    }

    /**
     * Загрузка файла
     *
     * @param FileRequest $request
     * @return RedirectResponse
     */
    public function upload(FileRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $file = $request->file('file');

        $filePath = $file->store('uploads', 'public');

        File::create([
            'user_id' => Auth::id(),
            'folder_id' => $validated['folder_id'] ?? null,
            'name' => $file->getClientOriginalName(),
            'path' => $filePath,
            'size' => $file->getSize(),
            'type' => $file->getMimeType(),
            'extension' => $file->getClientOriginalExtension(),
        ]);

        return redirect()->back()->with('success', 'Файл успешно загружен');
    }
}
