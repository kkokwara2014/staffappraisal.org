<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postqualiexperience extends Model
{
    
    protected $fillable=[
        'postheld',
        'employer',
        'startdate',
        'enddate',
        'appraisal_id',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function appraisal(){
        return $this->belongsTo(Appraisal::class);
    }
}
