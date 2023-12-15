<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans bg-gray-100">

    <div class="container mx-auto p-4 flex justify-between items-center">
        <!-- Titre de la page à gauche -->
        <h1 class="text-3xl font-bold">{{ __('app.title', [], session('locale', 'fr')) }}</h1>

        <!-- Menu de sélection de langue à droite -->
        <div class="space-x-2">
            <select onchange="window.location.href=this.value"
                class="border p-2 rounded-md focus:outline-none focus:border-blue-500">
                <option value="{{ route('setLocale', 'fr') }}" {{ session('locale') == 'fr' ? 'selected' : '' }}>🇫🇷
                    FRANCAIS</option>
                <option value="{{ route('setLocale', 'en') }}" {{ session('locale') == 'en' ? 'selected' : '' }}>🇬🇧
                    ENGLISH</option>
            </select>



        </div>
    </div>

    <div class="container mx-auto p-4">
        <!-- Formulaire pour ajouter une nouvelle tâche -->
        <h2 class="text-xl font-bold mb-4">{{ __('app.ajout_tache', [], session('locale', 'fr')) }}</h2>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <label for="name">Nom de la tâche:</label>
            <input type="text" name="name" required
                class="border p-2 rounded-md focus:outline-none focus:border-blue-500">
            <button type="submit"
                class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                Ajouter
            </button>
        </form>

        <!-- Liste des tâches -->
        <h2 class="text-xl font-bold mt-4">Tasks</h2>
        <ul>
            @foreach ($tasks as $task)
                <li>
                    <form action="{{ route('tasks.update', $task) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PATCH')
                        <input type="checkbox" name="completed" onChange="this.form.submit()"
                            {{ $task->completed ? 'checked' : '' }}>
                    </form>

                    {{ $task->name }}

                    <a href="{{ route('tasks.edit', $task) }}">Éditer</a>

                    <a href="{{ route('tasks.destroy', $task) }}"
                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $task->id }}').submit();">Supprimer</a>

                    <form id="delete-form-{{ $task->id }}" action="{{ route('tasks.destroy', $task) }}"
                        method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </li>
            @endforeach
        </ul>

        <!-- Liste des tâches complétées -->
        <h2 class="text-xl font-bold mt-4">Tâches complétées</h2>
        <ul>
            @foreach ($completedTasks as $completedTask)
                <li>{{ $completedTask->name }}</li>
            @endforeach
        </ul>
    </div>

</body>

</html>
