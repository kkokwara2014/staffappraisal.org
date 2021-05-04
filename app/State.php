<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{


    public function users(){
        return $this->hasMany(User::class);
    }

    public function lgas(){
        return $this->hasMany(Lga::class);
    }
}
