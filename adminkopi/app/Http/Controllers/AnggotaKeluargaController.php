<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\AnggotaKeluarga;
use DB;

class AnggotaKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $langgota = DB::table('master_anggota')->select('id','nama_lengkap')->get();
        $lkeluarga = DB::table('master_keluarga')->select('id','kode_keluarga')->get();
        $lak = DB::table('anggota_keluarga')
                ->join('master_keluarga','anggota_keluarga.keluarga_id','=','master_keluarga.id')
                ->join('master_anggota','anggota_keluarga.anggota_id','=','master_anggota.id')
                ->select('anggota_keluarga.*','master_keluarga.kode_keluarga','master_keluarga.id','master_anggota.nama_lengkap','master_anggota.id')
                ->get();
        $user = Auth::user();
        return view('child.anggotakeluarga',compact('user','langgota','lkeluarga','lak'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'keluarga_id'=>$request->keluarga_id,
            'anggota_id'=>$request->anggota_id,
            'status_keluarga'=>$request->status_keluarga,
            'anak_ke'=>$request->anak_ke
        ];
        DB::table('anggota_keluarga')->insert($data);
        Alert::success('success','Data berhasil di Tambah');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
