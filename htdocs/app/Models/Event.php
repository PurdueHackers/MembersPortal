<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model {
	use SoftDeletes;
	protected $dates = ['event_time','deleted_at'];

	public function members() {
		return $this->belongsToMany('App\Models\Member');
	}
	
	public function date() {
		return $this->event_time->format('Y-m-d');
	}
	
	public function hour() {
		return $this->event_time->format('H');
	}
	
	public function minute() {
		return $this->event_time->format('i');
	}
}
