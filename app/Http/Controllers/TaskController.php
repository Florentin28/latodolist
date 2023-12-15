<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        $completedTasks = Task::where('completed', true)->get();
        $title = __('tasks.title');
        return view('tasks.index', compact('tasks', 'completedTasks', 'title'));
    }

    public function store(Request $request)
    {
        Task::create($request->except('_token'));
        return redirect()->route('tasks.index');
    }

    public function update(Request $request, Task $task)
    {
        $task->update(['completed' => $request->has('completed')]);
        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

    // Nouvelle méthode pour définir la langue
    public function setLocale($locale)
    {
        // Vérifiez si la langue est valide
        if (!in_array($locale, ['en', 'fr'])) {
            abort(400);
        }

        // Changez la langue pour la session en cours
        session(['locale' => $locale]);

        // Redirigez vers la page d'accueil
        return redirect()->route('tasks.index');
    }
}
