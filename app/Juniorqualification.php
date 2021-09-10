<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juniorqualification extends Model
{
    protected $fillable=[
        'qualification',
        'dateobtained',
        'specialization',
        'appraisal_id',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function appraisal(){
        return $this->belongsTo(Appraisal::class);
    }

    public function appraisalreports(){
        return $this->hasMany(Appraisalreport::class);
    }
}
