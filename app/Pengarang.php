<?php

namespace App;

use App\Book;
use Illuminate\Database\Eloquent\Model;

class Pengarang extends Model
{

    protected $guarded = ['id'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('pengarang', 'like', '%' .$search. '%');
    }
}
