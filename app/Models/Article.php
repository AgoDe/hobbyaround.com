<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter($query, Array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){

            $query->where('title' , 'like', '%' . $search . '%');
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
