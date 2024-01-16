<?php

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;
class Career extends Eloquent implements StaplerableInterface {

	use  EloquentTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'vaccancies';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
        
        protected $fillable = ['job_title','company','job_location','post_date','responsibilities_content','requirements_content','footer_content','active'];
      
       
         
}
