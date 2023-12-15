<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run()
    {
        Task::create(['name' => 'Tâche 1', 'completed' => false]);
        Task::create(['name' => 'Tâche 2', 'completed' => true]);
        // Ajoutez d'autres tâches selon vos besoins
    }
}
