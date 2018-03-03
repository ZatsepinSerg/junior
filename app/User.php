<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','activationCode','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @param $email
     * @param $verifyToken
     * @return mixed
     */
    public function userInfo($email, $verifyToken)
    {
        $response = User::where(['email'=>$email,'activationCode'=>$verifyToken])->first();

        return  $response;
    }

    /**
     * @param $email
     * @param $verifyToken
     */
    public function updateStatus($email, $verifyToken)
    {
        User::where(['email'=>$email,'activationCode'=>$verifyToken])->update(['status'=>1,'activationCode'=>NULL]);
    }
}
