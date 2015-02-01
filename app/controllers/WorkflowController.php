<?php

use Innaco\Repositories\WorkflowRepo;
use Innaco\Repositories\DocumentRepo;
use Innaco\Managers\WorkflowManager;

class WorkflowController extends \BaseController {


	protected $workflowRepo;
	protected $documentRepo;

	public function __construct(WorkflowRepo $workflowRepo,DocumentRepo $documentRepo)
	{
		$this->workflowRepo = $workflowRepo;
		$this->documentRepo = $documentRepo;
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
		return View::make('workflow.list',compact('documents'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('document.create');
	}

	public function selectTypeDocument()
	{
		if(Input::has('search'))
		{
			$typeDocument = $this->typeDocumentRepo->search(Input::get('search'));
		}
		else{
			$typeDocument = $this->typeDocumentRepo->findAll(true);
		}
		return Response::json( array(
			'datos' => $typeDocument,
		));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();
		$task = $this->taskRepo->newTask();
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
		if(Input::has('search'))
		{
			$documents = $this->workflowRepo->search(Input::get('search'));
		}
		else{
			$documents = $this->workflowRepo->findAll(true);
		}
		return View::make('workflow.show',compact('workflow'));
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
