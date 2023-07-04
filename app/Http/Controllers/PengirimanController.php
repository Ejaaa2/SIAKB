<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pengiriman;
use App\Models\Peternak;
use App\Models\Stok_peternak;
use Illuminate\Http\Request;

class PengirimanController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function show(Pengiriman $pengiriman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengiriman $pengiriman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengiriman $pengiriman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengiriman $pengiriman)
    {
        //
    }
    public function buatpengiriman(Request $request){
        $nextKirim=date('Y-m-d',strtotime(('+7 days')));
        $today=date('Y-m-d');
        $idp=$request->idpeternak;

        $rnstok=Stok_peternak::select('stok_peternaks.stok')->where('stok_peternaks.peternak_id','=',$idp);
        $stokm=$request->stokp;

        $pengiriman = new Pengiriman();
        $pengiriman->peternak_id=$idp;
        $pengiriman->jumlah=$stokm;
        $pengiriman->barang_id=$request->idbarang;
        $pengiriman->tanggal=$today;
        $pengiriman->save();

        $peternak = Peternak::find($idp);
        $peternak->pengirimanselanjutnya=$nextKirim;
        $peternak->save();

        $stok=Stok_peternak::find($idp)->join('barangs','barang_id','=','barangs.idbarang')->where('tipe','=','Pakan');
        $stok->stok=$rnstok+$stokm;
        $stok->save();

    }
    public function showkirim(){
        $twoDbefore=date('Y-m-d', strtotime('-2 days'));
        $dataPakan = Stok_peternak::join('peternaks', 'peternak_id', '=', 'peternaks.id')->join('barangs','barang_id','=','barangs.idbarang')
        ->select('peternaks.*','barangs.*','stok_peternaks.*')
        ->where('barangs.tipe','=','pakan')->where('pengirimanselanjutnya','<=',$twoDbefore)
        ->get();
        return view ('/formpengiriman',compact('dataPakan'));
    }
}
