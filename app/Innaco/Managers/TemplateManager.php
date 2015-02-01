<?php namespace Innaco\Managers;

class TemplateManager extends BaseManager{

    public function getRules()
    {
        $rules = [
            'name' => 'required',
            'body' => 'required',
            'typedocuments_id' => 'required'
        ];

        return $rules;
    }
}