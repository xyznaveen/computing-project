<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
    	'address', 'user_id', 'phone_number', 'profile_url', 'profile_image_url', 'is_active',
    ];

    public function user() {
      return $this->belongsToOne('App\User');
    }

}
