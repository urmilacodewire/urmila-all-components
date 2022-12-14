<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;

    protected $table = 'articles';

     protected $fillable = ['title','category_id', 'author_id'];

     public function getCategory()
     {
     	return $this->belongsTo('App\Models\Category');

     }

     public function getAuthor()
    {
        return $this->belongsToMany(Author::class, 'articles_authors');
    }
}

