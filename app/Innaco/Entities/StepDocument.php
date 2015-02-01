<?php namespace Innaco\Entities;


class stepDocument extends \Eloquent {
	protected $fillable = ['templates_id','tasks_id', 'groups_id',];

	public function template(){
		return $this->belongsTo('Innaco\Entities\Template');
	}

	public function task(){
		return $this->belongsTo('Jacopo\Authentication\Models\Task');
	}

	public function group(){
		return $this->belongsTo('Jacopo\Authentication\Models\Group');
	}

	public function workflow(){
		return $this->hasMany('Innaco\Entities\Workflow');
	}

}