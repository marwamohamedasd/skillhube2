<?php

namespace Database\Seeders;

use App\Models\settingweb;
use Illuminate\Database\Seeder;

class settingseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
      settingweb  ::create([
            
            'email'=> 'info@skillhube.com',
            'phone'=> 0120222665,
            'facebook'=>'https://www.facebook.com',

            'instagram'=>'https://www.instagram.com',

            'youtube'=>'https://www.youtube.com',

            'linkedin'=>'https://www.linkedin.com',

            ]);


    }
}
