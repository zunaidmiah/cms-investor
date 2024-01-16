<?php

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;
class Brandslisting extends Eloquent implements StaplerableInterface {

	use  EloquentTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'brandslistings';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
        
        protected $fillable = ['type','title','short_description','url','display_order','bannerimage','active'];
        public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('bannerimage', [
            'styles' => [
            'large' => '600x624',
            'thumb' => '200x208'
            ]
        ]);
        
        
       
        parent::__construct($attributes);
    }
       
         
}
