<?php

namespace Modules\UsersManagement\Database\Seeders;

use App\Models\User;
use Database\Seeders\UsersSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersManagementDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();
        // User::factory(5)->create();
        // factory(User::class)->create();
        // \Modules\UsersManagement\Database\factories::factory(5)->create();
        // $this->seed();
        $this->call([
            UsersSeeder::class,
        ]);
    }
}
