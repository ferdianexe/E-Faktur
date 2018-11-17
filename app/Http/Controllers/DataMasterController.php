<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataMaster; 
class DataMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataMasters = DataMaster::all();
        return view('data', compact('dataMasters'));
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
        $request->validate([
            'name'=>'required',
            'harga'=> 'required|integer',
            'stock'=> 'required|integer',
            'satuan'=> 'required',
          ]);
          $dataMaster = new DataMaster([
            'name' => $request->get('name'),
            'harga'=> $request->get('harga'),
            'stock'=> $request->get('stock'),
            'satuan'=> $request->get('satuan'),
          ]);
          $dataMaster->save();
          return redirect('/data')->with('success', 'Stock has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataMaster = DataMaster::find($id);
        return view('data-edit', compact('dataMaster'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataMaster = DataMaster::find($id);
        return view('data-edit', compact('dataMaster'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'harga'=> 'required|integer',
            'stock'=> 'required|integer',
            'satuan'=> 'required',
          ]);
          $dataMaster = DataMaster::find($id);
          $dataMaster->name = $request->get('name');
          $dataMaster->stock = $request->get('stock');
          $dataMaster->harga = $request->get('harga');
          $dataMaster->satuan = $request->get('satuan');
          $dataMaster->save();
          return redirect('/data')->with('success', 'Stock has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataMaster = DataMaster::find($id);
        $dataMaster->delete();
   
        return redirect('/data')->with('success', 'Stock has been deleted Successfully');
    }
}
