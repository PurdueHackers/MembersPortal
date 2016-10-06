<?php
	
/*
	@ Harris Christiansen (Harris@HarrisChristiansen.com)
	2016-04-25
	Project: Members Tracking Portal
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model {
	
	protected $dates = [
        'created_at',
        'updated_at',
        'setupEmailSent'
    ];

	public function major() {
		return $this->hasOne('App\Models\Major','id','major_id');
	}
	
	public function locations() {
		return $this->hasMany('App\Models\LocationRecord');
	}
	
	public function events() {
		return $this->belongsToMany('App\Models\Event')->withPivot('recorded_by');
	}
	
	public function publicEventCount() {
		return $this->events()->where('privateEvent',false)->get()->count();
	}
	
	public function applications() {
		return $this->hasMany('App\Models\Application');
	}
	
	public function reset_token() {
		return md5($this->id.$this->password.env('ADMIN_PASS'));
	}
	
	public function reset_url() {
		return action('PortalController@getReset', [$this->id, $this->reset_token()]);
	}
	
	public function picturePath() {
		$fileExt = pathinfo($this->picture, PATHINFO_EXTENSION);
		return '/uploads/member_pictures/'.$this->id."_".substr(md5($this->picture), -6).'.'.$fileExt;
	}
	
	public function resumePath() {
		$fileExt = pathinfo($this->resume, PATHINFO_EXTENSION);
		return '/uploads/resumes/'.$this->id."_".substr(md5($this->resume), -6).'.'.$fileExt;
	}
	
}
