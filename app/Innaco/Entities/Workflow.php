<?php namespace Innaco\Entities;


class Workflow extends \Eloquent {

	protected $fillable = ['documents_id','users_id', 'states_id','stepsdocuments_id'];

	public function document(){
		return $this->belongsTo('Innaco\Entities\Document','documents_id','id');
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