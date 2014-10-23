<?php

namespace Cashout\Models;

/**
 * UsersGroups
 *
 * @property integer $user_id
 * @property integer $group_id
 * @method static \Illuminate\Database\Query\Builder|\UsersGroups whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\UsersGroups whereGroupId($value)
 */
class UsersGroups extends \Eloquent
{
    protected $table = "users_groups";
}