<?php

namespace Database\Seeders;

use App\Models\SekolahModel;
use Illuminate\Database\Seeder;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SekolahModel::factory(1)->create();
    }
}
