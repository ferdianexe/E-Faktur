<?php

namespace App\Http\Controllers;

use App\PurchaseInvoiceItems;
use Illuminate\Http\Request;

class PurchaseInvoiceItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama'=>'required',
            'satuan'=> 'required',
            'jumlah'=> 'required|integer',
            'harga'=> 'required|integer',
            'diskon'=> 'required|integer',
        ]);
        $purchaseInvoiceItems = new PurchaseInvoiceItems([
            'nama' => $request->get('nama'),
            'satuan'=> $request->get('satuan'),
            'jumlah' => $request->get('jumlah'),
            'harga'=> $request->get('harga'),
            'diskon'=> $request->get('diskon'),
        ]);
        $purchaseInvoiceItems->save();
//        return redirect('/invoices')->with('success', 'Invoice has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PurchaseInvoiceItems  $purchaseInvoiceItems
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseInvoiceItems $purchaseInvoiceItems)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PurchaseInvoiceItems  $purchaseInvoiceItems
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseInvoiceItems $purchaseInvoiceItems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PurchaseInvoiceItems  $purchaseInvoiceItems
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseInvoiceItems $purchaseInvoiceItems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PurchaseInvoiceItems  $purchaseInvoiceItems
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseInvoiceItems $purchaseInvoiceItems)
    {
        //
    }
}
