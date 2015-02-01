<?php

use Innaco\Entities\typeDocument;

class TypeDocumentTableSeeder extends Seeder {

	public function run()
	{

		TypeDocument::create([
			'name' => 'Constancia'
		]);

		TypeDocument::create([
			'name' => 'Memorandum'
		]);

		TypeDocument::create([
			'name' => 'Solicitudes'
		]);

	}

}