<?php

use Innaco\Repositories\DocumentRepo;
use Innaco\Repositories\TypeDocumentRepo;
use Innaco\Managers\DocumentManager;

class DocumentController extends \BaseController {


	protected $documentRepo;
	protected $typeDocumentRepo;

	public function __construct(DocumentRepo $documentRepo, TypeDocumentRepo $typeDocumentRepo)
	{
		$this->documentRepo = $documentRepo;
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
			$documents = $this->documentRepo->search(Input::get('search'));
		}
		else{
			$documents = $this->documentRepo->findAll(true);
		}
		return View::make('document.list',compact('documents'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Input::has('search'))
		{
			$typeDocuments = $this->typeDocumentRepo->search(Input::get('search'));
		}
		else{
			$typeDocuments = $this->typeDocumentRepo->findAll(true);
		}
		return View::make('document.create',compact('typeDocuments'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();
		$template = $this->taskRepo->newTask();
		$manager = new TaskManager($task, $data);
		$manager->save();

		return Redirect::route('task.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$task = $this->taskRepo->find($id);
		return View::make('task.edit')->with('task',$task);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$task = $this->taskRepo->find($id);
		$data = Input::all();
		$manager = new TaskManager($task, $data);
		$manager->save();

		return Redirect::route('task.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$task = $this->taskRepo->find($id);

		$task->delete();

		return Redirect::route('task.index');

	}


}
