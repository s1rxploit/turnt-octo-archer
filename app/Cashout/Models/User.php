<?php namespace Cashout\Models;

class User extends \Eloquent{

	protected $table = 'users';

	protected $hidden = array('password', 'remember_token');

}
