<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $makes = array(
            1 => 'Ford',
            2 => 'Toyota',
            3 => 'Mitsubishi',
            4 => 'Honda',
            5 => 'GMC',
            6 => 'Lincoln',
            7 => 'Lexus',
            8 => 'Mercedez-Benz',
            9 => 'Acura',
            10 => 'Audi',
            11 => 'BMW',
            12 => 'Kia',
            13 => 'Jeep',
            14 => 'Porsche',
            15 => 'Scion',
            16 => 'Jaguar',
            17 => 'Infinity',
            18 => 'Nissan',
            19 => 'Subaru',
            20 => 'Volkswagen',
            21 => 'Tesla',
        );

        $types = array(
            1 => 'Sedan',
            2 => 'Coupe',
            3 => 'Sports',
            4 => 'Station Wagon',
            5 => 'Hatchback',
            6 => 'Convertible',
            7 => 'SUV',
            8 => 'Minivan',
            9 => 'Truck',
            10 => 'Micro',
            11 => 'Roadster',
            12 => 'Van',
            13 => 'Super',
            14 => 'Muscle',
            15 => 'Hybrid',
            16 => 'Electric',
        );

        return [
            'user_id' => 2,
            'year' => $this->faker->numberBetween(1990, 2021),
            'make' => $makes[rand(1, 21)],
            'type' => $types[rand(1, 16)],
        ];
    }
}
