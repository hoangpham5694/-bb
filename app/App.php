<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    protected $table = 'apps';
    protected $fillable = [
        'appurl', 'id', 'description', 'image', 'slug', 'title', 
    ];
    public function user(){
        return $this->belongsTo('User');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
