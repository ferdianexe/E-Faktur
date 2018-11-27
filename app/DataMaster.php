<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataMaster extends Model
{
    protected $fillable = [
        'name', 'harga', 'stock','satuan'
    ];
}
