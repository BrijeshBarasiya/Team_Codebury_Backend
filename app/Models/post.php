<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $fillable = ['caption'];
    public function comments()
    {
        return $this->hasMany(comment::class);
    }
    public function likes()
    {
        return $this->hasMany(like::class);
    }
}
