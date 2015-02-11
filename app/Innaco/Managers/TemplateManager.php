<?php namespace Innaco\Managers;

class TemplateManager extends BaseManager{

    public function getRules()
    {
        $rules = [
            'name' => 'required|unique:templates',
            'body' => 'required',
            'typedocuments_id' => 'required',
            'available' => 'required'
        ];

        return $rules;
    }
}