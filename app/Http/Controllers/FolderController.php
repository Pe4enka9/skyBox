<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FolderController extends Controller
{
    /**
     * Все папки пользователя
     *
     * @return View
     */
    public function index(): View
    {
        /** @var Folder[] $folders */
        $folders = Folder::where('user_id', Auth::id())->whereNull('parent_id')->get();

        return view('folders.index', [
            'folders' => $folders,
        ]);
    }

    /**
     * Создание папки
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Folder::create([
            'user_id' => Auth::id(),
            'parent_id' => $request->parent_id ?? null,
            'name' => $validated['name'],
        ]);

        return redirect()->back()->with('success', 'Папка создана');
    }

    public function destroy(Folder $folder): RedirectResponse
    {
        if ($folder->user_id !== Auth::id()) {
            abort(403);
        }

        $folder->delete();

        return redirect()->back()->with('success', 'Папка удалена');
    }
}
