<?php

use Innaco\Repositories\TypeDocumentRepo;
use Innaco\Managers\TypeDocumentManager;

class typeDocumentController extends \BaseController {

	protected $typeDocumentRepo;

	public function __construct(TypeDocumentRepo $typeDocumentRepo)
	{
		$this->typeDocumentRepo = $typeDocumentRepo;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Input::has('search'))
		{
			$typeDocuments = $this->typeDocumentRepo->search(Input::get('search'));
		}
		else{
			$typeDocuments = $this->typeDocumentRepo->findAll(true);
		}

		return View::make('typeDocument.list',compact('typeDocuments'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('typeDocument.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();
		$typeDocument = $this->typeDocumentRepo->newTypeDocument();
		$manager = new TypeDocumentManager($typeDocument, $data);
		$manager->save();

		return Redirect::route('type_document.index');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$type_document = $this->typeDocumentRepo->find($id);
		return View::make('typeDocument.edit')->with('type_document',$type_document);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$typeDocument = $this->typeDocumentRepo->find($id);
		$data = Input::all();
		$manager = new TypeDocumentManager($typeDocument, $data);
		$manager->save();

		return Redirect::route('type_document.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$typeDocument = $this->typeDocumentRepo->find($id);

		$typeDocument->delete();

		return Redirect::route('type_document.index');

	}


}
