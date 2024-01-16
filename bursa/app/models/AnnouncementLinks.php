<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;
class AnnouncementLinks extends Eloquent
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
//	protected $table = 'annc';
	protected $table = 'announcementlinks';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	protected $fillable = [
		'announcementname',
		'announcementurl',
		'announcementtype',
		'status',
	];
}
