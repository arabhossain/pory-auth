<?php


namespace Pory\Auth\Models;


class User extends \App\Models\User
{
    protected $connection = 'poryAuthDBConnection';
}
