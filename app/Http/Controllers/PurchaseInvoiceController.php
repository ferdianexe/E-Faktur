<?php

namespace App\Http\Controllers;

use App\PurchaseInvoice;
use App\PurchaseInvoiceItems;
use App\DataMaster;
use Illuminate\Http\Request;

class PurchaseInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $purchaseInvoices = PurchaseInvoice::all();
        return view('invoices', compact('purchaseInvoices'));
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
    public function store(Request $request, $banyak)
    {
        //
        $request->validate([
            'kode'=>'required',
            'harga'=> 'required|integer',
        ]);
        $purchaseInvoice = new PurchaseInvoice([
            'kode' => $request->get('kode'),
            'harga'=> $request->get('harga'),
        ]);
        $purchaseInvoice->save();
        $counter = $banyak;
        for($i = 1 ; $i<= $counter ; $i++){
            $boolean  = isset($request['nama'.$i]) && $request['nama'.$i] != null
                && isset($request['harga'.$i]) && $request['harga'.$i] != null
                && isset($request['jumlah'.$i]) && $request['jumlah'.$i] != null
                && isset($request['diskon'.$i]) && $request['diskon'.$i] != null;
            if(!$boolean) continue;
            $data1 = [
                "nama" => $request['nama'.$i],
                "harga" => $request['harga'.$i],
                "jumlah" => $request['jumlah'.$i],
                "diskon" => $request['diskon'.$i],
                "purchase_invoices_id" => $purchaseInvoice->id,
            ];
            $purchaseInvoiceItems = PurchaseInvoiceItems::create($data1);
        }
        return redirect('/invoices')->with('success', 'Invoice has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PurchaseInvoice  $purchaseInvoice
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseInvoice $purchaseInvoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PurchaseInvoice  $purchaseInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $purchaseInvoices = PurchaseInvoice::find($id);
        return view('invoices-edit', compact('purchaseInvoices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PurchaseInvoice  $purchaseInvoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'kode'=>'required',
            'harga'=> 'required|integer',
        ]);
        $purchaseInvoices = PurchaseInvoice::find($id);
        $purchaseInvoices->kode = $request->get('kode');
        $purchaseInvoices->harga = $request->get('harga');
        $purchaseInvoices->save();
        return redirect('/invoices')->with('success', 'Invoice has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PurchaseInvoice  $purchaseInvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseInvoice $purchaseInvoice)
    {
        //
    }
}
