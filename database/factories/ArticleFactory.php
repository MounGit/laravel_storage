<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" =>$this->faker->word,
            "description" => $this->faker->sentence,
            "date" => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            "author" => $this->faker->name,
            "url"=>"photo1.jpg"
        ];
    }
}
