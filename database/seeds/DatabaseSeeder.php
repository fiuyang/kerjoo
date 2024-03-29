<?php

use App\AnnualLeave;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create();
        factory(AnnualLeave::class, 10)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
