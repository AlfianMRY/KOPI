<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\MasterAnggota;
use Alert;

class MasterAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        $manggota = MasterAnggota::orderByDesc('id')->get();
        return view('master.manggota',compact('manggota','user'));
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
            'nama_lengkap'=>$request->nama_lengkap,
            'nama_panggilan'=>$request->nama_panggilan,
            'no_hp'=>$request->no_hp,
            'email'=>$request->email ?? '-',
            'jk'=>$request->jk,
            'domisili'=>$request->domisili,
            'status_marital'=>$request->status_marital,
            'tmpt_lahir'=>$request->tmpt_lahir,
            'tgl_lahir'=>$request->tgl_lahir,
        ];
        DB::table('master_anggota')->insert($data);
        Alert::success('success','Data berhasil di tambah');
        return back();
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
        $old = MasterAnggota::find($id);
        $data = [
            'nama_lengkap'=>$request->nama_lengkap ?? $old->nama_lengkap,
            'nama_panggilan'=>$request->nama_panggilan ?? $old->nama_panggilan,
            'no_hp'=>$request->no_hp ?? $old->no_hp,
            'email'=>$request->email ?? $old->email,
            'jk'=>$request->jk ?? $old->jk,
            'domisili'=>$request->domisili ?? $old->domisili,
            'status_marital'=>$request->status_marital ?? $old->status_marital,
            'tmpt_lahir'=>$request->tmpt_lahir ?? $old->tmpt_lahir,
            'tgl_lahir'=>$request->tgl_lahir ?? $old->tgl_lahir,
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
        MasterAnggota::find($id)->delete();
        Alert::success('success','Data berhasil di Hapus');
        return back();
    }
}
