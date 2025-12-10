<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table      = 'login_details';
    protected $primaryKey = 'id';

    protected $allowedFields = ['user_name', 'password', 'name'];

    public function getUserByUsername(string $username)
    {
        return $this->where('user_name', $username)->first();
    }
}
