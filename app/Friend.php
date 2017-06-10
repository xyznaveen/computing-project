<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $fillable = [
      'user_one','user_two',
    ];

    public function friendWith() {
      return $this->belongsTo('App\User', 'user_one');
    }

    public function friendOf() {
      return $this->belongsTo('App\User', 'user_two');
    }

}
