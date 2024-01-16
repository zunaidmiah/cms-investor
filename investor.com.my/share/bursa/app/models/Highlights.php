<?php

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;
class Highlights extends Eloquent implements StaplerableInterface {

	use  EloquentTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'highlights';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
        
    protected $fillable = ['active','earnpershare','netpershare','currentratio','pretaxprofit','pretaxshareholders','year'];
         
}
