<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    
    protected $fillable=[
        'institutionname',
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
