<?php

class Vacancy extends \Eloquent {
	protected $fillable = [];
        protected $table = 'vacancies';

       	public function career(){
				return $this->belongsTo('Career','career_vacancy_id','id');
        }

}
