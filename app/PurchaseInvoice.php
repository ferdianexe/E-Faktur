<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
    //
    protected $appends = [
        'total'
    ];

    protected $fillable = [
        'kode','harga','created_at'
    ];

    public function items(){
        return $this->hasMany('App\PurchaseInvoiceItems', 'purchase_invoices_id','id');
    }

    public function getTotalAttribute(){
        $total = 0;
        foreach($this->items as $item){
            $total += $item->total;
        }
        return $total;
    }
}
