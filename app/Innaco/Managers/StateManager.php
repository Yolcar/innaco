<?php namespace Innaco\Managers;

class StateManager extends BaseManager{

    public function getRules()
    {
        $rules = [
            'name' => 'required|unique:states'
        ];

        return $rules;
    }
}