<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $table = Barang::all();

        
        return response()->json([
            "message" => "Load data success",
            "data" => $table
        ], 200); 
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
        $table = new Barang();
        $table->nama = $request->nama;
        $table->deskripsi = $request->deskripsi;
        $table->penjual = $request->penjual;
        $table->jumlah = $request->jumlah;
        $table->save();  

        return $table;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Barang::find($id);
        if ($table){
            return $table;
        }else {
            return ["message" => "Data not found"];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $table = Barang::find($id);
        if($table){
            $table->nama = $request->nama ? $request->nama : $table->nama;
            $table->deskripsi = $request->deskripsi ? $request->deskripsi : $table->deskripsi;
            $table->penjual = $request->penjual ? $request->penjual : $table->penjual;
            $table->jumlah = $request->jumlah ? $request->jumlah : $table->jumlah;
            $table->save();
            
            return $table;
        } else {
            return["message" => "Data not found"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Barang::find($id);
        if($table){
            $table->delete();
            return["message" => "Delete Succes"];
        } else {
            return["mesagge" => "Data not found"];
        }
    }
}
