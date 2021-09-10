<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profmembership extends Model
{
    

    public function appraisalreports(){
        return $this->hasMany(Appraisalreport::class);
    }
}
