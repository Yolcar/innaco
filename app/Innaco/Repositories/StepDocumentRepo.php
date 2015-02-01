<?php namespace Innaco\Repositories;

use Innaco\Entities\stepDocument;

class stepDocumentRepo extends BaseRepo{

    public function getModel()
    {
        return new stepDocument();
    }

    public function newDocument()
    {
        $stepDocument = new stepDocument();
        return $stepDocument;
    }

}