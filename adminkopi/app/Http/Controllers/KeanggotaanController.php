<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\MasterTingkat;
use App\Models\MasterAnggota;
use App\Models\MasterArea;
use App\Models\Keanggotaan;
use DB;
use Alert;

class KeanggotaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $tingkat = DB::table('master_tingkat')->select('id','kode_tingkat')->get();
        $anggota = DB::table('master_anggota')->select('id','nama_lengkap')->get();
        $area = DB::table('master_area')->select('id','nama_area')->get();
        $keanggotaan = DB::table('keanggotaan')
                        ->join('master_anggota','keanggotaan.anggota_id','=','master_anggota.id')
                        ->join('master_tingkat','keanggotaan.tingkat_id','=','master_tingkat.id')
                        ->join('master_area','keanggotaan.area_id','=','master_area.id')
                        ->select('keanggotaan.*','master_tingkat.kode_tingkat','master_anggota.nama_lengkap','master_area.nama_area')
                        ->get();
        // dd($keanggotaan);
        return view('child.keanggotaan',compact('user','tingkat','anggota','area','keanggotaan'));
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
        $valid = $request->validate([
            'anggota_id' => 'required',
            'tingkat_id' => 'required',
            'area_id' => 'required',
            'status' => 'required',
            'tgl_aktif' => 'nullable|date',
            'tgl_nonaktif' => 'nullable|date',
        ]);
        if ($valid) {
            DB::table('keanggotaan')->insert($valid);
            Alert::success('success','Data berhasil di Tambah');
            return back();
        }else{
            
            Alert::error('Gagal','Data Gagal di Tambah');
            return back();
        }
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
        Keanggotaan::find($id)->update($request->all());
        Alert::success('success','Data berhasil di Update');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Keanggotaan::find($id)->delete();
        Alert::success('success','Data berhasil di Hapus');
        return back();
    }
}
