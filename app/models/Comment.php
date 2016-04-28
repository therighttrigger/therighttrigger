<?php

class Comment extends Eloquent {
	protected $table = 'comments';

	public static $rules = array(
		'name' => 'required|max:100',
		'email' =>'email',
		'message' => 'required'
	);
}