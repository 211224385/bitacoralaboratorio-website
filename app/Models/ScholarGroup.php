<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarGroup extends Model
{
    use HasFactory;

    public function career (){
    	return $this->belongsTo (Career::class);
    }

public function students (){
    	return $this->hasMany (User::class);
    }


}

