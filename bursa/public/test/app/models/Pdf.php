<?php

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;
class Pdf extends Eloquent implements StaplerableInterface {

	use  EloquentTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pdf';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
        
        protected $fillable = ['active','title','date','type','pdf'];
        public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('pdf');
        parent::__construct($attributes);
    }
      
       
         
}
