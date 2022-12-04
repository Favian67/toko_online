<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Order::all();
        
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
        $table = new Order();
        $table->nama = $request->nama;
        $table->barang = $request->barang;
        $table->jumlah = $request->jumlah;
        $table->alamat = $request->alamat;
        $table->pembayaran = $request->pembayaran;
        $table->status = $request->status;
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
        $table = Order::find($id);
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
        $table = Order::find($id);
        if($table){
            $table->nama = $request->nama ? $request->nama : $table->nama;
            $table->barang = $request->barang ? $request->barang : $table->barang;
            $table->jumlah = $request->jumlah ? $request->jumlah : $table->jumlah;
            $table->alamat = $request->alamat ? $request->alamat : $table->alamat;
            $table->pembayaran = $request->pembayaran ? $request->pembayaran : $table->pembayaran;
            $table->status = $request->status ? $request->status : $table->status;
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
        $table = Order::find($id);
        if($table){
            $table->delete();
            return["message" => "Delete Succes"];
        } else {
            return["mesagge" => "Data not found"];
        }
    }
}
