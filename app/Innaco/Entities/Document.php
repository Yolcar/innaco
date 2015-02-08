<?php namespace Innaco\Entities;

use Nicolaslopezj\Searchable\SearchableTrait;

class Document extends \Eloquent {

	use SearchableTrait;

	/**
	 * Searchable rules.
	 *
	 * @var array
	 */
	protected $searchable = [
		'columns' => [
			'serial' => 10,
			'execute_date' => 10,
			'name' => 5,
			'body' => 1,
		],
	];

	protected $fillable = ['serial','name', 'body','templates_id','execute_date'];

	public function template(){
		return $this->belongsTo('Innaco\Entities\Template','templates_id','id');
	}

	public function workflow(){
		return $this->hasMany('Innaco\Entities\Workflow','documents_id','id');
	}

}