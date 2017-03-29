<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login_History extends Model
{
    protected $table = 'login_history';
    protected $fillable = [
        'id', 'name', 'email', 'image_url', 'updated_at', 'created_at','history' ,
    ];
    public $incrementing = false;
}
