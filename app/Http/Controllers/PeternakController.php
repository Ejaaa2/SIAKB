<?php

namespace App\Http\Controllers;

use App\Models\Peternak;
use App\Models\Stok_peternak;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

use function PHPUnit\Framework\returnSelf;

class PeternakController extends Controller
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
     * @param  \App\Models\Peternak  $peternak
     * @return \Illuminate\Http\Response
     */
    public function show(Peternak $peternak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peternak  $peternak
     * @return \Illuminate\Http\Response
     */
    public function edit(Peternak $peternak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peternak  $peternak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peternak $peternak)
    {
        //
    }
    public function getdatapeternak (){
        //cara 1 join
        $data = Peternak::select('peternaks.*')
            ->get();
        //cara 2 join
        // $data=DB::table('peternaks')
        //     ->join('stok_peternaks', 'peternaks.id', '=', 'stok_peternaks.peternak_id')
        //     ->select('peternaks.*', 'stok_peternaks.*')
        //     ->get();
        return view('/datapeternak',compact('data'));
    }
    public function stokpeternak(){
        $dataAyam = Stok_peternak::join('peternaks', 'peternak_id', '=', 'peternaks.id')->join('barangs','barang_id','=','barangs.idbarang')
            ->select('peternaks.*','barangs.*','stok_peternaks.*')->where('barangs.tipe','=','Bibit')
            ->get();
        // $dataObat = Stok_peternak::join('peternaks', 'peternak_id', '=', 'peternaks.id')->join('barangs','barang_id','=','barangs.id')
        //     ->select('peternaks.*','barangs.*','stok_peternaks.*')->where('barangs.tipe','=','obat')
        //     ->get();
        // $dataPakan = Stok_peternak::join('peternaks', 'peternak_id', '=', 'peternaks.id')->join('barangs','barang_id','=','barangs.id')
        //     ->select('peternaks.*','barangs.*','stok_peternaks.*')->where('barangs.tipe','=','pakan')
        //     ->get();
        return view ('/stokpeternak',compact('dataAyam'));
    }
    public function tambahpeternak(Request $request){
        // echo json_encode($request->all()); **tampilkan semua inputan
        // return false;
        $today=date('Y-m-d');
        $fotokk = $request->file('fotokk')->store('public/peternak/identitas');
        $fotojaminan = $request->file('fotojaminan')->store('public/peternak/jaminan');
        $peternak = new Peternak();
        $peternak->pengirimanselanjutnya = Carbon::parse($request->bibitaw)->addDays(7);
        $peternak->nama = $request->namapeternak;
        $peternak->alamat = $request->alamatpeternak;
        $peternak->nohp = $request->nohp;
        $peternak->jaminan = $request->jaminan;
        $peternak->fotojaminan = $fotojaminan;
        $peternak->bank = $request->namabank;
        $peternak->norek = $request->nomorek;
        $peternak->fotosyarat = $fotokk;
        $peternak->namasupp = $request->namasupplier;
        $peternak->wilayah = $request->wilayahL;
        $peternak->initkirim=$today;
        $peternak->save();

        $peternakId = $peternak->id;

        $stokpeternak = new Stok_peternak();
        $stokpeternak->stok = $request->jumlahdoc;
        $stokpeternak->peternak_id= $peternakId;
        $stokpeternak->barang_id=1;
        $stokpeternak->save();

        //query untuk update by id
        // $petern = Peternak::where('id',$idpeternak)->first();
        // $petern->fotosyarat = "avatar3.png";
        // $petern->save();
        return redirect(url('/tambahpeternak'))->with('success', 'Data user berhasil disimpan.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peternak  $peternak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peternak $peternak)
    {
        //
    }
}
