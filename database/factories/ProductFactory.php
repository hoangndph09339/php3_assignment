<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'category_id' => $this->faker->numberBetween(1,10),
            'image_url' => 'https://i.guim.co.uk/img/media/a11168cf68ddcb75e39513f1bd120e041aa6f7e2/538_284_4384_2630/master/4384.jpg?width=1200&height=1200&quality=85&auto=format&fit=crop&s=7ae500eade83ac49082d2edb91bf55fe',
            'description' => $this->faker->text(100), // password
            'price' => $this->faker->numberBetween(20,200),
            'sale_percent' => $this->faker->numberBetween(0,100),
            'stocks' =>$this->faker->numberBetween(1,20),
            'is_active' => $this->faker->numberBetween(0,1),
        ];
    }
}
