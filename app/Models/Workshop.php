<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;

    public function career(){
    	return $this->hasOneThrough(
    'App\Models\Career',
    'App\Models\ScholarGroup',
    'id',
    'id',
    'scholar_group_id',
    'career_id'
);
    }
}
