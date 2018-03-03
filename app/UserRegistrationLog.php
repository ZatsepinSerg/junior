<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRegistrationLog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'user_id', 'activated',
    ];


    public $timestamps = false;

    public function registerTime($id)
    {
        UserRegistrationLog::create([
            'user_id' => $id,
            'activated' => date('Y-m-d H:i:s'),
        ]);
    }

}
