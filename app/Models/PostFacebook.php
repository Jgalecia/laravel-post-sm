<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostFacebook extends Model
{
    use HasFactory;

    protected $table = 'post_facebooks';

    protected $fillable = [
        'title',
        'cotent',
        
        'image',
    ];
}
