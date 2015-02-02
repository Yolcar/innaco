<?php

use Innaco\Repositories\DocumentRepo;
use Innaco\Repositories\TemplateRepo;
use Innaco\Repositories\TypeDocumentRepo;
use Innaco\Managers\DocumentManager;

class pruebaController extends \BaseController
{


    protected $documentRepo;
    protected $typeDocumentRepo;
    protected $templateRepo;

    public function __construct(DocumentRepo $documentRepo, TypeDocumentRepo $typeDocumentRepo, TemplateRepo $templateRepo)
    {
        $this->documentRepo = $documentRepo;
        $this->typeDocumentRepo = $typeDocumentRepo;
        $this->templateRepo = $templateRepo;
    }


    public function index()
    {
        $documents = $this->documentRepo->findAll();
        $plantillas = $this->templateRepo->findAll();
        return View::make('prueba',compact('documents','plantillas'));
    }


}