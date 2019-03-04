<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class zona extends Model
{

    protected $table ='zona';

    protected $fillable = [
        'kode', 'keterangan',
    ];

}
