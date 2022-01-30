<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterArea;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class MasterAreaController extends Controller
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
        $area = MasterArea::get();
        return view('master.marea',compact('area','user'));
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
            'nama_area' => $request->nama_area,
            'kode_area' => $request->kode_area,
            'keterangan' => $request->keterangan
        ];
        MasterArea::create($data);
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
        $lama = MasterArea::find($id);
        $data = [
            'nama_area' => $request->nama_area ?? $lama->nama_area,
            'kode_area' => $request->kode_area ?? $lama->kode_area,
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
        MasterArea::find($id)->delete();
        Alert::success('Success', 'Data Berhasil Di Hapus');
        return back();
    }
}
