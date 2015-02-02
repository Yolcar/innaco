<?php

use Innaco\Repositories\TemplateRepo;
use Innaco\Repositories\TypeDocumentRepo;
use Innaco\Repositories\StepDocumentRepo;
use Innaco\Repositories\TaskRepo;
use Innaco\Managers\TemplateManager;
use Innaco\Managers\StepDocumentManager;

class templateController extends \BaseController {


	protected $templateRepo;
	protected $typeDocumentRepo;
	protected $stepDocumentRepo;
	protected $taskRepo;

	public function __construct(TemplateRepo $templateRepo, TypeDocumentRepo $typeDocumentRepo, StepDocumentRepo $stepDocumentRepo, TaskRepo $taskRepo)
	{
		$this->templateRepo = $templateRepo;
		$this->typeDocumentRepo = $typeDocumentRepo;
		$this->stepDocumentRepo = $stepDocumentRepo;
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
			$templates = $this->templateRepo->search(Input::get('search'));
		}
		else{
			$templates = $this->templateRepo->findAll(true);
		}
		return View::make('template.list',compact('templates'));
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
			$typeDocuments= $this->typeDocumentRepo->findAll(true);
		}
		return View::make('template.create',compact('typeDocuments'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();
		$template = $this->templateRepo->newTemplate();
		$manager = new TemplateManager($template, $data);
		$manager->save();

		return Redirect::route('template.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$template = $this->templateRepo->find($id);
		return View::make('template.show')->with('template',$template);
	}

	public function steps($id)
	{
		$template = $this->templateRepo->find($id);
		$steps = $this->taskRepo->findAll();
		$groups = DB::table('groups')->orderBy('id','asc')->lists('name','id');
		$totalSteps = $this->taskRepo->getModel()->orderBy('id','asc')->lists('id','id');
		$stepDocuments = $this->stepDocumentRepo->getModel()->where('templates_id','=',$id)->get();

		return View::make('stepdocument.step',compact('steps','groups','stepDocuments'))->with('template',$template)->with('totalSteps',$totalSteps);
	}

	public function stepsSave()
	{
		$template_id = Input::get('templates_id');
		$groups_id = Input::get('groups_id');
		$tasks_id = Input::get('tasks_id');
		$order = Input::get('order');

		$tasks = DB::table('step_documents')->where('templates_id', '=' ,$template_id)->get();

		foreach($tasks as $task){
			DB::table('step_documents')->delete($task->id);
		}

		foreach ($tasks_id as $key => $n) {
			if($groups_id[$key] !=NULL AND $order[$key]!=NULL){
				$arrData = array('templates_id' => $template_id, 'tasks_id' => $tasks_id[$key], 'groups_id' => $groups_id[$key], 'order' => $order[$key]);
				$stepDocument = $this->stepDocumentRepo->newStepDocument();
				$manager = new StepDocumentManager($stepDocument, $arrData);
				$manager->save();
			}
		}

		return Redirect::route('template.index');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$template = $this->templateRepo->find($id);
		return View::make('template.edit')->with('template',$template);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$template = $this->templateRepo->find($id);
		$data = Input::all();
		$manager = new TemplateManager($template, $data);
		$manager->save();

		return Redirect::route('template.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$template = $this->templateRepo->find($id);

		$template->delete();

		return Redirect::route('template.index');

	}


}
