<?php
namespace Modules\Sekolah\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SekolahFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Sekolah\Entities\Sekolah::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'namasekolah' => $this->faker->company(),
            'npsn' => $this->faker->randomNumber($nbDigits = 8, $strict = false),
            'bentukpendidikan' => $this->faker->randomElement($array = array ('sd','smp','sma')),
            'alamat' => $this->faker->streetAddress(),
            'kelurahan' => $this->faker->citySuffix(),
            'kecamatan' => $this->faker->citySuffix(),
            'distrik' => $this->faker->city(),
            'provinsi' => $this->faker->state(),
            'kodepos' => $this->faker->postcode(),
            'lat' => $this->faker->latitude($min = -90, $max = 90),
            'lng' => $this->faker->longitude($min = -180, $max = 180),
            'telp' => $this->faker->tollFreePhoneNumber(),
            'email' => $this->faker->email(),
            'website' => $this->faker->safeEmailDomain(),
            'logo' => $this->faker->imageUrl($width = 640, $height = 480),
        ];
    }
}

