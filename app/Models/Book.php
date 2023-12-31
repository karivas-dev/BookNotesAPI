<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function users() {
        return $this->hasMany(BookUser::class);
    }
}
