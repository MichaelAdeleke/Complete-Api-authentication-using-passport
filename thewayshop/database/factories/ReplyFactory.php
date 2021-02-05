<?php

namespace Database\Factories;

use App\Models\Reply;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class ReplyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reply::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $reply=$this->faker->unique()->words($nb=2,$text=true);
        return [
            //
            'body'=>$reply,
            'product_id'=>$this->faker->numberBetween(1,22),
            'category_id'=>$this->faker->numberBetween(1,5),
        ];
    }
}
