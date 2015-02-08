<?php

use Innaco\Repositories\DocumentRepo;
use Innaco\Repositories\TemplateRepo;

class documentController extends \BaseController {


	protected $documentRepo;
	protected $templateRepo;

	public function __construct(DocumentRepo $documentRepo, TemplateRepo $templateRepo)
	{
		$this->documentRepo = $documentRepo;
		$this->templateRepo = $templateRepo;
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
			$templates = $this->templateRepo->search(Input::get('search'));
		}
		else{
			$templates = $this->templateRepo->findAll(true);
		}
		return View::make('document.selectTemplate',compact('templates'));
	}

	public function writeDocument($id)
	{
		$template = $this->templateRepo->find($id);
		return View::make('document.create')->with('template', $template);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

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

	}


}
