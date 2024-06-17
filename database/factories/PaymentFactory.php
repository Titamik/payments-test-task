<?php

namespace Database\Factories;

use App\Enums\PaymentStatusEnum;
use App\Models\Currency;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::query()->inRandomOrder()->first()->id,
            'currency_id' => Currency::query()->inRandomOrder()->first()->id,
            'props' => fake()->paragraph(),
            'value' => fake()->randomFloat(2, 0, 10000),
            'status' => fake()->randomElement(PaymentStatusEnum::getValues()),
        ];
    }
}
