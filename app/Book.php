<?php

namespace App;

use App\Borrow;
use App\Pengarang;
use App\Penerbit;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $guarded = ['id'];


    public function pengarang()
    {
        return $this->belongsTo(Pengarang::class);
    }

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class);
    }

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('title', 'like', '%' .$search. '%');
    }
}
