<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\MasterKeluarga;
use Alert;

class MasterKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $mkeluarga = DB::table('master_keluarga')->select('*')->get();
        return view('master.mKeluarga',compact('mkeluarga','user'));
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
        $data = [
            'kode_keluarga' => $request->kode_keluarga,
            'alamat' => $request->alamat,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
        ];
        DB::table('master_keluarga')->insert($data);
        Alert::success('success','Data berhasil di tambah');
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $old = MasterKeluarga::find($id);
        $data = [
            'kode_keluarga' => $request->kode_keluarga ?? $old->kode_keluarga,
            'alamat' => $request->alamat ?? $old->alamat,
            'kelurahan' => $request->kelurahan ?? $old->keluarahan,
            'kecamatan' => $request->kecamatan ?? $old->kecamatan,
            'kota' => $request->kota ?? $old->kota,
            'provinsi' => $request->provinsi ?? $old->provinsi,
        ];
        $old->update($data);
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
        //
        MasterKeluarga::find($id)->delete();
        Alert::success('success','Data berhasil di Hapush');
        return back();
    }
}
