<?php

namespace Database\Factories;

use App\Models\Link;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class LinkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Link::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'url' => $this->faker->url,
            'slug' => Str::random(6),
            'is_enabled' => true,
        ];
    }

    public function ofUser(User $user)
    {
        return $this->state([
            'user_id' => $user->id,
        ]);
    }
}