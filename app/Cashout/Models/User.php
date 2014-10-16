<?php namespace Cashout\Models;

use Auth;
use DB;

class User extends \Eloquent{

	protected $table = 'users';

	protected $hidden = array('password', 'remember_token');

}
