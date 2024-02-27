<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'position',
        'status',
    ];
 
    public function post()
    {
        return $this->belongsTo(post::class);
    }

    public function images()
    {
        return $this->hasMany(image::class);
    }
}
