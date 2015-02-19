<?php

use Innaco\Entities\User;

class userTableSeeder extends Seeder {

	public function run()
	{
        User::create([
            'full_name' => 'Yolcar Cortez',
            'email' => 'xyolcar@gmail.com',
            'password' => '123456',
            'available' => 1
        ])->groups()->attach(1);

        User::create([
            'full_name' => 'Jonathan Linares',
            'email' => 'jonathanlinares91@gmail.com',
            'password' => '20666251',
            'available' => 1
        ])->groups()->attach(1);

        User::create([
            'full_name' => 'Ysaias Henriquez',
            'email' => 'ysaias1032@gmail.com',
            'password' => '18421458',
            'available' => 1
        ])->groups()->attach(1);

        User::create([
            'full_name' => 'Yaudilis Garcia',
            'email'     => 'yaudilisgarcia@gmail.com',
            'password'  => '20920508',
            'available' => 1
        ])->groups()->attach(1);
	}

}