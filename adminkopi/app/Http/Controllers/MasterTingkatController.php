<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterTingkat;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class MasterTingkatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $tingkat = MasterTingkat::get();
        return view('master.mTingkat',compact('tingkat','user'));
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
        // dd($request->all());
        $data = [
            'nama_tingkat' => $request->nama_tingkat,
            'kode_tingkat' => $request->kode_tingkat,
            'keterangan' => $request->keterangan
        ];
        MasterTingkat::create($data);
        Alert::success('Success', 'Data Berhasil Di Tambah');
        return redirect()->back();

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
        $lama = MasterTingkat::find($id);
        $data = [
            'nama_tingkat' => $request->nama_tingkat ?? $lama->nama_tingkat,
            'kode_tingkat' => $request->kode_tingkat ?? $lama->kode_tingkat,
            'keterangan' => $request->keterangan ?? $lama->keterangan
        ];
        $lama->update($data);
        Alert::success('Success', 'Data Berhasil Di Update');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MasterTingkat::find($id)->delete();
        Alert::success('Success', 'Data Berhasil Di Hapus');
        return back();
    }
}
