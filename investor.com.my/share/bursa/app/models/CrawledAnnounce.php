<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;
class CrawledAnnounce extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'crawledannounces';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
	protected $fillable = [
			'title',
			'company_name',
			'category',
			'html',
			'date_of_publishing',
			'status',
			'reference_no'
	];
	
         
}
