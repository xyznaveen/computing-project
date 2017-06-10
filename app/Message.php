<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
      'set_by','received_by','message_text',
    ];

    public function sentBy() {
      return $this->belongsTo('App\User', 'sent_by');
    }

    public function receivedBy() {
      return $this->belongsTo('App\User', 'received_by');
    }

}
