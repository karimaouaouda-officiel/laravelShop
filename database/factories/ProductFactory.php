<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $arr = ['waiting' , 'published'];
    public function definition()
    {
        return [
            'user_id' => rand(1 , 100),
            'name' => Str::random(40),
            'description' => Str::random(150),
            'price' => rand(5 , 80),
            'statut' => $this->arr[rand(0 , 1)],
            'pic_path' => asset('./media/hp.jpg')
        ];
    }
}
