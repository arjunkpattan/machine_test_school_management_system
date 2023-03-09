<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Arjun',
            'email' => 'arjun@gmail.com',
            'password' => bcrypt('Arjun@1234'),
        ]);
    }
}
