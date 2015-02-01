<?php

use Innaco\Entities\Task;

class taskTableSeeder extends Seeder {

	public function run()
	{
		Task::create([
			'name' => 'Crear'
		]);

		Task::create([
			'name' => 'Revisar'
		]);

		Task::create([
			'name' => 'Validar'
		]);

		Task::create([
			'name' => 'Autorizar'
		]);

		Task::create([
			'name' => 'Aprobar'
		]);

	}

}