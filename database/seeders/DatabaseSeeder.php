<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $tags = (new TagSeeder())->collect();
        $users = (new UserSeeder())->collect();

        foreach ($users as $user) {
            $questions = Question::factory()->count(5)->create([
                'user_id' => $user->id,
            ]);

            foreach ($questions as $question) {
                $question->tags()->attach(
                    $tags->random(rand(1, 5))->pluck('id')->toArray()
                );

                $answerCount = rand(3, 10);
                Answer::factory()->count($answerCount)->create([
                    'user_id' => $users->where('id', '!=', $user->id)->random()->id,
                    'question_id' => $question->id,
                ]);

                $question->answers_count = $answerCount;
                $question->views = rand(0, 1000);
                $question->save();
            }
        }
    }
}
