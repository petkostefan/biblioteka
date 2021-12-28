<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\User;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::pluck('id')->toArray();
        for ($i=0; $i < 4; $i++) { 
            $users[] = null;
        }
        $authors = Author::pluck('id')->toArray();
        $publishers = Publisher::pluck('id')->toArray();
        return [
            'naziv' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'opis' => $this->faker->text($maxNbChars = 100),
            'ocena' => $this->faker->numberBetween($min = 1, $max = 10),
            'autor_id' => $this->faker->randomElement($authors),
            'izdavac_id' => $this->faker->randomElement($publishers),
            'user_id' => $this->faker->randomElement($users)
        ];
    }
}
