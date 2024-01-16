<?php

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;
class Report extends Eloquent implements StaplerableInterface {

	use  EloquentTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'reports';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
        
        protected $fillable = ['active','title','content','date','image','type','pdf','pdf2','pdf3','pdf4'];
        public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('pdf');
		$this->hasAttachedFile('pdf2');
		$this->hasAttachedFile('pdf3');
		$this->hasAttachedFile('pdf4');
		 $this->hasAttachedFile('image', [
            'styles' => [
            'large' => '600x400',
            'thumb' => '200x208'
            ]
        ]);
        parent::__construct($attributes);
    }
      
       
         
}
