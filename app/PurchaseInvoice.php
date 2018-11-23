<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
    //
    protected $fillable = [
        'kode','harga','created_at'
    ];
}
