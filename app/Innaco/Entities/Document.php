<?php namespace Innaco\Entities;

class Document extends \Eloquent {
	protected $fillable = ['name', 'body','templates_id','execute_date'];

	public function template(){
		return $this->belongsTo('Innaco\Entities\Template','templates_id','id');
	}

	public function workflow(){
		return $this->hasMany('Innaco\Entities\Workflow');
	}

}