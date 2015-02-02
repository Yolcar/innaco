<?php namespace Innaco\Entities;


class stepDocument extends \Eloquent {
	protected $fillable = ['templates_id','tasks_id', 'groups_id','order'];

	public function template(){
		return $this->belongsTo('Innaco\Entities\Template');
	}

	public function task(){
		return $this->belongsTo('Innaco\Entities\Task','tasks_id','id');
	}

	public function group(){
		return $this->belongsTo('Jacopo\Authentication\Models\Group','groups_id','id');
	}

	public function workflow(){
		return $this->hasMany('Innaco\Entities\Workflow');
	}

}