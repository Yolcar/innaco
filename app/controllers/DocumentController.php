<?php

use Innaco\Repositories\DocumentRepo;
use Innaco\Repositories\TemplateRepo;
use Innaco\Repositories\StepDocumentRepo;
use Innaco\Managers\DocumentManager;

class documentController extends \BaseController {


	protected $documentRepo;
	protected $templateRepo;
    protected $stepDocumentRepo;

	public function __construct(DocumentRepo $documentRepo, TemplateRepo $templateRepo, StepDocumentRepo $stepDocumentRepo)
	{
		$this->documentRepo = $documentRepo;
		$this->templateRepo = $templateRepo;
        $this->stepDocumentRepo = $stepDocumentRepo;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        $user = \Sentry::getUser();
        $user->getGroups();
        $templates_id = $this->stepDocumentRepo->getModel()->select('templates_id')->distinct();

		if(Input::has('search'))
		{
		$documents = $this->documentRepo->getModel()->search(Input::get('search'));
		}
		else{
			$documents = $this->documentRepo->getModel();
		}
		if($templates_id->count()!=0){
			foreach($user->groups as $group)
			{
				$templates_id->orWhere('groups_id','=',$group->id);
			}
			if($templates_id->count()!=0){
				$templates_id = $templates_id->get();
				foreach ($templates_id as $template_id) {
					$documents = $documents->orWhere('templates_id','=',$template_id->templates_id);
				}
				$documents = $documents->paginate(20);
				return View::make('document.list',compact('documents'));
			}
			else{
				$documents = $documents->where('id','=',0)->paginate(20);
				return View::make('document.list',compact('documents'));
			}
		}
		else{
			$documents = $documents->where('id','=',0)->paginate(20);
			return View::make('document.list',compact('documents'));
		}
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		/**if(Input::has('search'))
		{
			$templates = $this->templateRepo->search(Input::get('search'));
		}
		else{
			$templates = $this->templateRepo->findAll(true);
		}
		return View::make('document.selectTemplate',compact('templates'));*/

		$user = \Sentry::getUser();
		$user->getGroups();
		$templates_id = $this->stepDocumentRepo->getModel()->select('templates_id')->distinct();

		if(Input::has('search'))
		{
			$templates = $this->templateRepo->getModel()->search(Input::get('search'));
		}
		else{
			$templates = $this->templateRepo->getModel();
		}
		if($templates_id->count()!=0){
			foreach($user->groups as $group)
			{
				$templates_id->orWhere(function ($query) use ($group){
					$query->where('groups_id','=',$group->id)->where('tasks_id','=',1);
				});
			}
			if($templates_id->count()!=0){
				$templates_id = $templates_id->get();
				foreach ($templates_id as $template_id) {
					$templates = $templates->orWhere('id','=',$template_id->templates_id);
				}
				$templates = $templates->paginate(20);
				return View::make('document.selectTemplate',compact('templates'));
			}
			else{
				$templates = $templates->where('id','=',0)->paginate(20);
				return View::make('document.selectTemplate',compact('templates'));
			}
		}
		else{
			$templates = $templates->where('id','=',0)->paginate(20);
			return View::make('document.selectTemplate',compact('templates'));
		}
	}

	public function writeDocument($id)
	{
		$user = \Sentry::getUser();
		$user->getGroups();
		$templates_id = $this->stepDocumentRepo->getModel()->select('templates_id')->distinct();

		$template = $this->templateRepo->getModel();
		if($template->count()!=0) {//si encuenta la plantilla
			if ($templates_id->count() != 0) {
				foreach ($user->groups as $group) {
					$templates_id->orWhere(function ($query) use ($group) {
						$query->Where('groups_id', '=', $group->id)->where('tasks_id', '=', 1);
					});
				}
				if ($templates_id->count() != 0) {
					$templates_id = $templates_id->get();
					foreach ($templates_id as $template_id) {
						if ($template_id->templates_id==$id){
							$template = $template->find($id);
						}
					}
					if($template->id==$id){
						return View::make('document.create')->with('template',$template);
					}
					else{
						//Error cuando no se tiene permiso para esa plantilla
						return Response::view('errors.missing', array(), 404);
					}
				} else {
					//Error cuando no se tiene el permiso para crear
					return Response::view('errors.missing', array(), 404);
				}
			} else {
				//Error cuando no hay ni pasos creados
				return Response::view('errors.missing', array(), 404);
			}
		}
		else{ //si NO se encuenta la plantilla
			return Response::view('errors.missing', array(), 404);
		}

		//return View::make('document.create')->with('template', $template);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        if(Input::has('execute_date'))
        {
            Input::merge(array('execute_date' => date("Y-m-d", strtotime(Input::get('execute_date')))));
        }
        $serial = $this->documentRepo->getModel()->where('templates_id','=',Input::get('templates_id'))->orderBy('serial','desc')->first();
        if ($serial)
        {
            $serial = $serial->serial+1;
        }
        else
        {
            $serial = 1;
        }
        $data = Input::all();
        $data += array('serial' => $serial);
        $document = $this->documentRepo->newDocument();
        $manager = new DocumentManager($document, $data);
        $manager->save();
        $datos = array('documents_id' => $document->id, 'templates_id' => $document->templates_id);
        return Redirect::route('workflow.create',$datos);

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

        $this->documentRepo->destroy($id,'id');
        return Redirect::route('document.index');

	}


}
