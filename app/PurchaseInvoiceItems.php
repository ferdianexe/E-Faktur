<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseInvoiceItems extends Model
{
    //
    protected $fillable = [
        'nama', 'satuan', 'jumlah', 'harga', 'diskon', 'purchase_invoices_id',
    ];

    protected $appends = [
        'total',
    ];

    public function getTotalAttribute(){
        return $this->jumlah * $this->harga - $this->diskon;
    }
}
