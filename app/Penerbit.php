<?php

namespace App;

use App\Book;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{

    protected $guarded = ['id'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('penerbit', 'like', '%' .$search. '%');
    }
}
