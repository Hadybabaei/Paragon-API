<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'description' => "lorem morem",
            'body' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque iusto vel fugiat obcaecati magni tempora accusantium quam atque minus odit. Obcaecati dolorem libero sunt quas veritatis recusandae eum harum. Debitis!",
            'user_id' => 1,
            'category_id'=>1,
        ];
    }
}
