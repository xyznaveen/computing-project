<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
    	'report_type', 
    	'reported_text', 
    	'reported_by', 
    	'flaged_id',
    ];

    

}
