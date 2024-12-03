<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\usertype;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Usertype::create([
            'name' => 'user',
        ]);
        Usertype::create([
            'name' => 'admin',
        ]);

        // Create a user
        $admin = new User();
        $admin->name = 'karam';
        $admin->email = 'qqqqkaramnaser@gmail.com';
        $admin->password = bcrypt('12341234'); // Hash the password
        $admin->usertype_id = 2; // Assuming admin has usertype_id = 2
        $admin->save();
    
    }
}
