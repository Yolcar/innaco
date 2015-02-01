<?php namespace Innaco\Entities;

class Template extends \Eloquent {
	protected $fillable = ['name', 'body','typedocuments_id'];

	public function documents(){
		return $this->hasMany('Innaco\Entities\Document');
	}

	public function typedocuments(){
		return $this->belongsTo('Innaco\Entities\TypeDocument');
	}

	public function stepdocuments(){
		return $this->hasMany('Innaco\Entities\StepDocument');
	}


}