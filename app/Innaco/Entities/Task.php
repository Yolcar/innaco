<?php namespace Innaco\Entities;

use Nicolaslopezj\Searchable\SearchableTrait;

class Task extends \Eloquent {

	use SearchableTrait;

	/**
	 * Searchable rules.
	 *
	 * @var array
	 */
	protected $searchable = [
		'columns' => [
			'name' => 10,
		],
	];

	protected $fillable = ['name'];

	public function stepDocument(){
		return $this->hasMany('Innaco\Entities\StepDocument');
	}
}