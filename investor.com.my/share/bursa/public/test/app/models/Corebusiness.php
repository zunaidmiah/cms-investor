<?php

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;
class Corebusiness extends Eloquent implements StaplerableInterface {

	use  EloquentTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'corebusinesses';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
        
        protected $fillable = ['title','short_description','url','display_order','corebusinessimage','active'];
        public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('corebusinessimage', [
            'styles' => [
            'large' => '600x624',
            'thumb' => '200x208'
            ]
        ]);
        
        
       
        parent::__construct($attributes);
    }
       
         
}
