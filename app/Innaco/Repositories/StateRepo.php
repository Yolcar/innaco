<?php namespace Innaco\Repositories;
use Innaco\Entities\State;

class StateRepo extends BaseRepo {

    public function getModel()
    {
        return new State();
    }

    public function newTypeDocument()
    {
        $state = new State();
        return $state;
    }

}