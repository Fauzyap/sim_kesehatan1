<?php

namespace App\Http\Controllers;


use App\Models\XI;
use App\Exports\XiExport;
use App\Imports\XiImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class xiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswaXI=XI::all();        
        return view('siswaXI.index' , compact('siswaXI'));
    }

    public function Xiexport(){
        return Excel::download(new XiExport, 'datasiswaXI.xlsx');
    }

    
    public function XiImport(Request $request){
        
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
     
        // menangkap file excel
        $file = $request->file('file');
     
        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();
     
        // upload ke folder file_siswa di dalam folder public
        $file->move('DatakelasXI',$nama_file);
     
        // import data
        Excel::import(new XiImport, public_path('/DatakelasXI/'.$nama_file));
     
        // notifikasi dengan session
        Session::flash('sukses','Data Siswa Berhasil Diimport!');
     
        // alihkan halaman kembali
        return redirect('/siswaXI');

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
    public function edit(XI $siswaXI)
    {
        return view('siswaXI.edit',compact('siswaXI'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, XI $siswaXI)
    {
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'JK' => 'required',
            'rombel' => 'required',
            'rayon' => 'required',
        ]);
  
        $siswaXI->update($request->all());
  
        return redirect()->route('siswaXI.index')
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
        $siswaXI=XI::where('nis',$nis)->first();
        $siswaXI->delete();

        return redirect()->route('siswaXI.index')
        ->with('success','Berhasil Hapus !');
        
    }
}
