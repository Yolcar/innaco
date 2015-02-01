<?php namespace Innaco\Entities;


class State extends \Eloquent {
	protected $fillable = ['name'];

	public function workflow(){
		return $this->hasMany('Innaco\Entities\Workflow');
	}
}