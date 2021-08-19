<?php

namespace Database\Factories;

use App\Models\Email;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Email::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::all();
        $user_1 = $users->where("id",rand(1,5));
        $user_2 = $users->where("id",rand(1,5));
        return [
            "title" => $this->faker->sentence(),
            "text" => $this->faker->sentence(),
            "sender_id" =>1,
            "rec_id"=>2
        ];
    }
}
