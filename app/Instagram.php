<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instagram extends Model
{

    protected $table = 'instagram';
    public $timestamps = false;
    
    protected $fillable = [
        'image',
        'video',
        'date',
        'caption',
        'tags',
        'link'
    ];
    
}
