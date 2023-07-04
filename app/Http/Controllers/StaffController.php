<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class StaffController extends Controller
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
    public function __construct()
    {
        $this->middleware('auth');
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
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        //
    }
    public function tambahkaryawan (Request $request){
        // $file = "avatar.png";
        $file = $request->fotokaryawan->store('public');
        // if(!empty($request->fotokaryawan)){
        //     $file = $request->fotokaryawan->store('public');
        // }
        // $validatedData = $request->validate([
        //     'name' => 'required|max:255',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:8',
        // ]);

        // $user = new User();
        // $user->name = $request->namakaryawan;
        // $user->alamat = $request->namakaryawan;
        // $user->name = $request->namakaryawan;
        // $user->name = $request->namakaryawan;
        // $user->name = $request->namakaryawan;
        // $user->save();
        $wilayaht=$request->wilayah;
        if($wilayaht=null && $request['jabatan']!='pengawas'){
            $wilayaht='kantor';
        }
        else{
            $wilayaht=$request->wilayah;
        }
        // echo json_encode($request->all());

        DB::table('users')->insert([
            'name'=>$request['namakaryawan'],
            'alamat'=>$request['alamatkaryawan'],
            'nohp'=>$request['nohp'],
            'jabatan'=>$request['jabatan'],
            'foto'=>$file,
            'wilayahtugas'=>$wilayaht,
            'email'=>$request['emailkaryawan'],
            'password'=>bcrypt($request['password'])
        ]);
        return redirect(url('/tambahkaryawan'))->with('success', 'Data user berhasil disimpan.');
    }
    public function getdatakaryawan()
    {
        $data = User::select('users.*')->get();
        return view('/datakaryawan',compact('data'));
    }
    public function tampilformkaryawan(){
        return view('formtambahkaryawan');
    }
    public function profil(){
        $datastaff = User::select('users.*')->get();
        return view('/tampilprofil', compact('datastaff'));
    }
}
