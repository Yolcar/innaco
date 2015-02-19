<?php

use Innaco\Entities\Group;

class groupTableSeeder extends Seeder {

	public function run()
	{
        Group::create([
            'name' => 'Management',
            'available' => 1
        ]);

        Group::create([
            'name' => 'Editor de Usuarios',
            'available' => 1
        ]);

        Group::create([
            'name' => 'Secretaria Recursos Humanos',
            'available' => 1
        ]);

        Group::create([
            'name' => 'Gerente Recursos Humanos',
            'available' => 1
        ]);

        Group::create([
            'name' => 'Secretaria de Administracion',
            'available' => 1
        ]);

        Group::create([
            'name' => 'Gerente de Administracion',
            'available' => 1
        ]);

        Group::create([
            'name' => 'Secretaria Logistica',
            'available' => 1
        ]);

        Group::create([
            'name' => 'Gerente Logistica',
            'available' => 1
        ]);
	}

}