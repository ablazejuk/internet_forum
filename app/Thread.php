<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'description'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
