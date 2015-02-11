<?php namespace Innaco\Managers;

class TaskManager extends BaseManager{

    public function getRules()
    {
        $rules = [
            'name' => 'required|unique:tasks',
            'available' => 'required'
        ];

        return $rules;
    }
}