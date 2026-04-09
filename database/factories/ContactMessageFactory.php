<?php

namespace Database\Factories;

use App\Models\ContactMessage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactMessageFactory extends Factory
{
    protected $model = ContactMessage::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'company' => $this->faker->company(),
            'phone' => $this->faker->phoneNumber(),
            'budget' => $this->faker->randomElement(['Less than $10k', '$10k-$50k', '$50k-$150k', '$150k+']),
            'message' => $this->faker->paragraph(3),
            'is_read' => false,
        ];
    }
}
