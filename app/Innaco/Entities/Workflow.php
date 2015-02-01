<?php namespace Innaco\Entities;


class Workflow extends \Eloquent {
	protected $fillable = ['document_id','users_id', 'state_id','stepdocument_id'];

	public function document(){
		return $this->belongsTo('Innaco\Entities\Document');
	}

	public function user(){
		return $this->belongsTo('Jacopo\Authentication\Models\User');
	}

	public function state(){
		return $this->belongsTo('Innaco\Entities\State');
	}

	public function stepDocument(){
		return $this->belongsTo('Innaco\Entities\StepDocument');
	}


}