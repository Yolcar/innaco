<?php namespace Innaco\Managers;


class DocumentManager extends BaseManager{

    public function getRules()
    {
        $rules = [
            'name' => 'required',
            'body' => 'required',
            'execute_date'   =>  'requiered',
            'templates_id' => 'required'
        ];

        return $rules;
    }

}