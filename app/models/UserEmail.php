<?php

class UserEmail extends \Eloquent {
	protected $table = 'user_emails';

	protected $fillable = array('address', 'confirmed', 'token');

    protected $guarded = array('id', 'user_id', 'token');

    protected $hidden = array('token','user_id');

	public function createToken(){
		return str_random(32);
	}

	public function user(){
		return $this->belongsTo('User','user_id');
	}
}