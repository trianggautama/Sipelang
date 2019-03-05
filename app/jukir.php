<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jukir extends Model
{

    protected $table ='jukir';

    protected $fillable = [
        'nama', 'no_hp','gambar',
    ];

}
