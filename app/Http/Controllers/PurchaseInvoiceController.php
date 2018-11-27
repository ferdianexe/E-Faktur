<?php

namespace App\Http\Controllers;

use App\PurchaseInvoice;
use App\PurchaseInvoiceItems;
use App\DataMaster;
use Illuminate\Http\Request;
use PDF;
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
        $dataMasters = DataMaster::all();
        return view('invoices-create',compact('dataMasters'));
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
        $totalHarga = 0 ;
        for($i = 1;$i<= $counter; $i++){
            $boolean  = isset($request['nama'.$i]) && $request['nama'.$i] != null
                 && isset($request['harga'.$i]) && $request['harga'.$i] != null
                 && isset($request['jumlah'.$i]) && $request['jumlah'.$i] != null;            
            if(!$boolean) continue;
            $diskon = 0 ;
            $harga = (int)$request['harga'.$i];
            $jumlah = (int)$request['jumlah'.$i];
            if(!$request['diskon'.$i]){
                $diskon = 0 ;
            }else{
                
                $diskon = (int)$request['diskon'.$i];

            }
            $total = ($harga*$jumlah)-$diskon;
            $data1 = [
                "nama" => $request['nama'.$i],
                "harga" => $request['harga'.$i],
                "jumlah" => $request['jumlah'.$i],
                "diskon" => $diskon,
                "purchase_invoices_id" => $purchaseInvoice->id,
                "totalHarga"=>$total,
            ];
            $totalHarga += $total;
            $purchaseInvoiceItems = PurchaseInvoiceItems::create($data1);  
        }
        $purchaseInvoice->harga = $totalHarga ;
        $purchaseInvoice->save();
        return redirect('/invoices')->with('success', 'Invoice has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PurchaseInvoice  $purchaseInvoice
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $purchaseInvoices = PurchaseInvoice::with('items')->find($id);
        return view('invoices-view', compact('purchaseInvoices'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PurchaseInvoice  $purchaseInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $purchaseInvoices = PurchaseInvoice::with('items')->find($id);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PurchaseInvoice  $purchaseInvoice
     * @return \Illuminate\Http\Response
     */
    public function exporttoPDF(Request $request, $id)
    {
        $purchaseInvoices = PurchaseInvoice::with('items')->find($id);
        $pdf = PDF::loadView('pdf-invoice',['purchaseInvoices'=>$purchaseInvoices])->setPaper('a4','portrait');
        $fileName = $purchaseInvoices->kode;
        //kalo mau liat pdfnya matiiin ini
        //return view('pdf-invoice', compact('purchaseInvoices'));
        //nyalain bawahnya
        return $pdf->stream($fileName.'.pdf');
    }
}
