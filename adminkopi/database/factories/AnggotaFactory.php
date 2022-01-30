<?php

namespace Database\Factories;

use App\Models\Anggota;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnggotaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Anggota::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'no_hp' => $this->faker->phoneNumber(),
            'tgl_lahir' => $this->faker->date(),
            'tingkat_id' => $this->faker->numberBetween(1,4),
            'status_id' => $this->faker->numberBetween(1,2),

        ];
    }
}
