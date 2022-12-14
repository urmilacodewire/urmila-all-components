<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

     protected $table = 'categories';

     protected $fillable = ['name'];

     public function oneArticle(){

     	return	$this->hasOne('App\Models\Article');	
     }

     public function manyArticle(){

    	 return	$this->hasMany('App\Models\Article');	
     }
}
