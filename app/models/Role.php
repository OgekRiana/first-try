<?php

class Role extends \Eloquent {
	protected $table = 'roles';
	protected $fillable = array('role');

	public function users(){
		return $this->belongsToMany('User', 'users_roles', 'role_id', 'user_id');
	}

}