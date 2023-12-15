<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks - Add</title>
</head>

<body>
    <h1>Ajouter une nouvelle tâche</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label for="name">Nom de la tâche:</label>
        <input type="text" name="name" required>
        <button type="submit">Ajouter</button>
    </form>
    <a href="{{
