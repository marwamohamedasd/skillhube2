<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
    
        User::create([
        'name'=>'Ahmed mohamed',
        'email'=> 'Ahmedmohamed@gmail.com',
        'password'=> Hash::make('Ait@123456'),
        'role_id'=>1 
        
        ]);

        User::create([
            'name'=>'hayam ali',
            'email'=> 'hayamali@gmail.com',
            'password'=> Hash::make('Ait@123456'),
            'role_id'=>2
            
            ]);
        
    }
}
