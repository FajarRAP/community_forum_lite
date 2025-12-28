<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ->has(Question::factory()->count(5)->has(Answer::factory()->count(3)))
        User::factory()->count(10)->create();
    }

    public function collect(): Collection
    {
        // ->has(Question::factory()->count(5)->has(Answer::factory()->count(3)))
        return User::factory()->count(10)->create();
    }
}
