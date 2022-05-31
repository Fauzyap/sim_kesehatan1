<?php

namespace App\Http\Controllers;

use App\Models\dataSiswa;
use App\Exports\Xexport;
use App\Imports\Ximport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class xController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataSiswa=dataSiswa::all();        
        return view('dataSiswa.index' , compact('dataSiswa'));
        // return "bisa";
    }

    public function Xexport(){
        return Excel::download(new Xexport, 'datasiswa.xlsx');
    }


    


    public function Ximport(Request $request){
        
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
     
        // menangkap file excel
        $file = $request->file('file');
     
        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();
     
        // upload ke folder file_siswa di dalam folder public
        $file->move('dataSiswa',$nama_file);
     
        // import data
        Excel::import(new XImport, public_path('/dataSiswa/'.$nama_file));
     
        // notifikasi dengan session
        Session::flash('sukses','Data Siswa Berhasil Diimport!');
     
        // alihkan halaman kembali
        return redirect('siswa_data');

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
    public function edit(dataSiswa $dataSiswa)
    {
        return view('dataSiswa.edit',compact('dataSiswa'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dataSiswa $dataSiswa)
    {
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'JK' => 'required',
            'rombel' => 'required',
            'rayon' => 'required',
        ]);
  
        $dataSiswa->update($request->all());
  
        return redirect()->route('siswa_data.index')
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
        $dataSiswa=dataSiswa::where('nis',$nis)->first();
        $dataSiswa->delete();

        return redirect()->route('siswa_data.index')
        ->with('success','Berhasil Hapus !');
    }
}
