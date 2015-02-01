<?php

use Innaco\Repositories\TaskRepo;
use Innaco\Managers\TaskManager;

class taskController extends \BaseController {


	protected $taskRepo;

	public function __construct(TaskRepo $taskRepo)
	{
		$this->taskRepo = $taskRepo;
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
			$tasks = $this->taskRepo->search(Input::get('search'));
		}
		else{
			$tasks = $this->taskRepo->findAll(true);
		}
		return View::make('task.list',compact('tasks'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('task.create');
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