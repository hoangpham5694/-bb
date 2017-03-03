<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads_Code extends Model
{
    protected $table = 'ads_codes';
    protected $fillable = [
        'id', 'name', 'code'
    ];
   
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
