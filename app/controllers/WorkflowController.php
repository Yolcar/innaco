<?php

use Innaco\Repositories\WorkflowRepo;
use Innaco\Repositories\DocumentRepo;
use Innaco\Repositories\StepDocumentRepo;
use Innaco\Managers\WorkflowManager;

class WorkflowController extends \BaseController {


	protected $workflowRepo;
	protected $documentRepo;
    protected $stepDocumentRepo;

	public function __construct(WorkflowRepo $workflowRepo,DocumentRepo $documentRepo, StepDocumentRepo $stepDocumentRepo)
	{
		$this->workflowRepo = $workflowRepo;
		$this->documentRepo = $documentRepo;
        $this->stepDocumentRepo = $stepDocumentRepo;
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function create()
	{
        $documents_id = Input::get('documents_id');
        $templates_id = Input::get('templates_id');
        $stepDocuments = $this->stepDocumentRepo->getModel()->where('templates_id','=',$templates_id)->where('available','=',1)->orderBy('order','asc')->get();
		$flag = false;
		$i = 0;
		foreach ($stepDocuments as $stepDocument)
        {
            if ($stepDocument->task->id == 1){
				$i = $stepDocument->order;
                $data = array('documents_id' => intval($documents_id),'states_id' => 3,'stepsdocuments_id' => intval($stepDocument->id),'users_id' => \Sentry::getUser()->getId());
            }
			elseif($stepDocument->order == $i){
				$flag = true;
				$data = array('documents_id' => intval($documents_id),'states_id' => 2,'stepsdocuments_id' => intval($stepDocument->id),'users_id' => 0);
			}
			elseif($stepDocument->order != $i and $flag == false){
				$flag = true;
				$i = $stepDocument->order;
				$data = array('documents_id' => intval($documents_id),'states_id' => 2,'stepsdocuments_id' => intval($stepDocument->id),'users_id' => 0);
			}
			else {
				$data = array('documents_id' => intval($documents_id),'states_id' => 1,'stepsdocuments_id' => intval($stepDocument->id),'users_id' => 0);
			}
            $workflow = $this->workflowRepo->newWorkflow();
            $manager = new WorkflowManager($workflow, $data);
            $manager->save();
        }

        return Redirect::route('document.index');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $user = \Sentry::getUser();
        $user->getGroups();
        $templates_id = $this->stepDocumentRepo->getModel()->select('templates_id')->distinct();
        $document = $this->documentRepo->getModel()->where('id','=',$id);
        $workflows = $this->workflowRepo->getModel()->where('documents_id','=',$id)->get();
        if($workflows->count() > 0 and $document->count() > 0){
            $document = $document->first();
            if($templates_id->count()!=0){
                foreach($user->groups as $group)
                {
                    $templates_id->orWhere('groups_id','=',$group->id);
                }
                $templates_id = $templates_id->get();
                if($templates_id->count()!=0){
                    return View::make('workflow.show',compact('workflows'))->with('document',$document);
                }
                else{
                    return Response::view('errors.missing', array(), 404);
                }
            }
            else{
                return Response::view('errors.missing', array(), 404);
            }
        }
        else{
            return Response::view('errors.missing', array(), 404);
        }
	}

    public function action($idDcument,$idWorkflow){
        $user = \Sentry::getUser();
        $user->getGroups();
        $templates_id = $this->stepDocumentRepo->getModel()->select('templates_id')->distinct();
        $document = $this->documentRepo->getModel()->where('id','=',$idDcument)->get();
        $workflow = $this->workflowRepo->getModel()->where('documents_id','=',$idDcument)->where('id','=',$idWorkflow)->where('states_id','=',2)->get();

        if($document->count() > 0 and $workflow->count() > 0){
            $document = $document->first();
            $workflow = $workflow->first();
            if($user->inGroup(\Sentry::findGroupByName($workflow->stepdocument->group->name))){
                return View::make('workflow.action')->with('document',$document)->with('workflow',$workflow);
            }else{
                return Response::view('errors.missing', array(), 404);
            }
        }else {
            return Response::view('errors.missing', array(), 404);
        }

    }


	public function update($idDocument,$idWorkflow)
	{
        $user = \Sentry::getUser();
        $user->getGroups();
        $templates_id = $this->stepDocumentRepo->getModel()->select('templates_id')->distinct();
        $document = $this->documentRepo->getModel()->where('id','=',$idDocument)->get();
        $workflow = $this->workflowRepo->getModel()->where('documents_id','=',$idDocument)->where('id','=',$idWorkflow)->where('states_id','=',2)->get();

        if($document->count() > 0 and $workflow->count() > 0){
            $workflow = $workflow->first();
            $document = $document->first();
            if($user->inGroup(\Sentry::findGroupByName($workflow->stepdocument->group->name))){

                if(Input::get('confirm')) {
                    $workflow->update(['states_id' => 3,'users_id' => intval($user->getId())]);

                    $order = $this->stepDocumentRepo->getModel()->where('id','=',$workflow->stepsdocuments_id)->select('order')->get()->first()->order;

                    $stepdocuments = $this->stepDocumentRepo->getModel()->select('id')->distinct()->where('order','=',intval($order))->where('templates_id','=',intval($document->templates_id))->get();
                    $workflow_order = $this->workflowRepo->getModel()->select('id')->distinct();
                    foreach($stepdocuments as $stepdocument){
                        $workflow_order->orWhere(function($query) use ($stepdocument){
                            $query->where('stepsdocuments_id','=',intval($stepdocument->id))->where('states_id','=',2);
                        });
                    }
                    $workflow_order = $workflow_order->get();
                    if($workflow_order->count() == 0){
                        $stepdocuments = $this->stepDocumentRepo->getModel()->select('order')->distinct()->where('order','>',intval($order))->where('templates_id','=',intval($document->templates_id))->get();
                        $stepdocuments = $this->stepDocumentRepo->getModel()->select('id')->distinct()->where('order','=',$stepdocuments->first()->order)->where('templates_id','=',intval($document->templates_id))->get();
                        $workflow_order = $this->workflowRepo->getModel()->select('id')->distinct();
                        foreach($stepdocuments as $stepdocument){
                            $workflow_order->orWhere(function($query) use ($stepdocument){
                                $query->where('stepsdocuments_id','=',intval($stepdocument->id));
                            });
                        }
                        $workflow_order = $workflow_order->get();
                        foreach($workflow_order as $temp){
                            $temp->update(['states_id' => 2]);
                        }
                    }

                } elseif(Input::get('deny')) {
                    $workflow->update(['states_id' => 4,'users_id' => intval($user->getId())]);

                }else{
                    return Response::view('errors.missing', array(), 404);
                }
                return Redirect::route('document.index');

            }else{
                return Response::view('errors.missing', array(), 404);
            }
        }else {
            return Response::view('errors.missing', array(), 404);
        }

	}

}
