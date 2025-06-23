<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TaskSeeder extends Seeder
{
    public function run()
    {
          // Create users first
        $users = User::factory(5)->create();
        
        $categories = ['work', 'personal', 'education', 'health'];
        $priorities = ['low', 'medium', 'high'];
        $statuses = ['pending', 'completed'];

        foreach ($users as $user) {
            Task::factory(15)->create([
                'user_id' => $user->id,
                'deadline' => Carbon::now()->addDays(rand(1, 30)),
                'category' => $categories[array_rand($categories)],
                'priority' => $priorities[array_rand($priorities)],
                'status' => $statuses[array_rand($statuses)],
                'progress' => rand(0, 100),
            ]);
        }
    }
}