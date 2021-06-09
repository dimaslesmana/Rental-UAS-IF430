<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user_accounts';
    protected $useTimestamps = true;
    protected $allowedFields = ['uid', 'role_id', 'name', 'email', 'password', 'address', 'phone_number'];
    private static $role_id = [
        'admin' => 'R0001',
        'user' => 'R0002'
    ];

    public function insertNewUser($data)
    {
        $this->save([
            'uid' => $data['uid'],
            'role_id' => self::$role_id['user'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'address' => $data['address'],
            'phone_number' => $data['phone_number'],
        ]);
    }

    public function getUserByEmail($email)
    {
        return $this->where(['email' => $email])->first();
    }

    public function getUserByUid($uid)
    {
        return $this->where(['uid' => $uid])->first();
    }

    public function getUserByPhoneNumber($phoneNumber)
    {
        return $this->where(['phone_number' => $phoneNumber])->first();
    }

    public function countUser()
    {
        return $this->countAll();
    }
}
