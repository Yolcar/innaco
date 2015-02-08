<?php namespace Innaco\Entities;

use Nicolaslopezj\Searchable\SearchableTrait;

class Template extends \Eloquent {

	use SearchableTrait;

	/**
	 * Searchable rules.
	 *
	 * @var array
	 */
	protected $searchable = [
		'columns' => [
			'name' => 10,
			'body' => 5
		],
	];

	protected $fillable = ['name', 'body','typedocuments_id'];

	public function documents(){
		return $this->hasMany('Innaco\Entities\Document');
	}

	public function typedocuments(){
		return $this->belongsTo('Innaco\Entities\TypeDocument');
	}

	public function stepdocuments(){
		return $this->hasMany('Innaco\Entities\StepDocument','id','templates_id');
	}


}