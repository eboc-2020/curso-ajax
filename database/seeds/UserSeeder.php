<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Crear un registro 
        factory(User::class)->create([
            'name' => 'Edyn Boc',
            'email' => 'eboc@pnc.gob.gt',
            'password' => bcrypt('123456')
        ]);
        User::factory(10)->create();
    }
}
