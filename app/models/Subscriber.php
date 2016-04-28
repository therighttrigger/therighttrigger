<?php

class Subscriber extends Eloquent {
	protected $table = 'subscribers';

	public static $rules = array(
		'name' => 'required',
		'email' => 'required|email'
	);
}