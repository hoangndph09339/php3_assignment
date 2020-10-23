<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$12$4jCGBNNSGaR7xjyC7Qv6tumNp6OVi0IFOaE9Ru7jwHkyO4qF/Z9Ai', // password
            'address' => $this->faker->address,
            'birthday' => $this->faker->dateTimeBetween('-30 years', '-10 years'),
            'role' =>$this->faker->numberBetween(0,2),
            'is_active' => $this->faker->numberBetween(0,1),
            'remember_token' => Str::random(10),
        ];
    }
}
