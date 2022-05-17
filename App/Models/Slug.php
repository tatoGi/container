<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slug extends Model
{
    use HasFactory;

    
    public $timestamps = false;

    protected $guarded = [];


    public function slugable(){
        
        return $this->morphTo();
    }


}
