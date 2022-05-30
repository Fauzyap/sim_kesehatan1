<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\XII;
use App\Exports\XiiExport;
use App\Imports\XiiImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class xiiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswaXII=XII::all();        
        return view('siswaXII.index' , compact('siswaXII'));
    }

    public function XiiExport(){
        return Excel::download(new XiiExport, 'datasiswaXII.xlsx');
    }


    public function XiiImport(Request $request){
        
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
     
        // menangkap file excel
        $file = $request->file('file');
     
        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();
     
        // upload ke folder file_siswa di dalam folder public
        $file->move('DatakelasXII',$nama_file);
     
        // import data
        Excel::import(new XiiImport, public_path('/DatakelasXII/'.$nama_file));
     
        // notifikasi dengan session
        Session::flash('sukses','Data Siswa Berhasil Diimport!');
     
        // alihkan halaman kembali
        return redirect('/siswaXII');

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
    public function edit(XII $siswaXII)
    {
        return view('siswaXII.edit',compact('siswaXII'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, XII $siswaXII)
    {
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'JK' => 'required',
            'rombel' => 'required',
            'rayon' => 'required',
        ]);
  
        $siswaXII->update($request->all());
  
        return redirect()->route('siswaXII.index')
                        ->with('success','Berhasil Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nis)
    {
        $siswaXII=XII::where('nis',$nis)->first();
        $siswaXII->delete();

        return redirect()->route('siswaXII.index')
        ->with('success','Berhasil Hapus !');
        
    }
}
