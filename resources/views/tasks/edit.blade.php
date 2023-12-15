<!-- resources/views/tasks/edit.blade.php -->

@extends('layouts.app') {{-- Assurez-vous d'adapter le nom de la mise en page à votre configuration si nécessaire --}}

@section('content')
    <h1>Modifier la tâche</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PATCH')

        <label for="name">Nom de la tâche:</label>
        <input type="text" name="name" value="{{ $task->name }}" required>

        <label for="completed">Complété:</label>
        <input type="checkbox" name="completed" {{ $task->completed ? 'checked' : '' }}>

        <button type="submit">Enregistrer les modifications</button>
    </form>

    <a href="{{ route('tasks.index') }}">Retour à la liste des tâches</a>
@endsection
