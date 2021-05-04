<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable=['name','code'];

    public function departments()
    {
        return $this->hasMany(Department::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
