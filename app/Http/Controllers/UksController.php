<?php

namespace App\Http\Controllers;

use App\Models\dataSiswa;
use App\Models\InputS;
use Illuminate\Http\Request;

class UksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $sakit=InputS::all();        
        return view('sakit.index' , compact('sakit'));

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $dataSiswa = dataSiswa::all();
        return view('sakit.create',compact('dataSiswa', $dataSiswa));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $siswa = dataSiswa::where('nis',$request->nis)->first();
        $request->validate([
            'nis'=>'required',
            'nama'=>'required',
            'JK'=>'required',
            'rombel'=>'required',
            'rayon'=>'required',
            'tanggal'=>'required',
            'pukul'=>'required',
            'suhutubuh'=>'required',
            'tensi'=>'required',
            'diagnosa'=>'required',
            'keterangan'=>'required'
        ]);

        InputS::create([
            'nis'=>$siswa['nis'],
            'nama'=>$siswa['nama'],
            'JK'=>$siswa['JK'],
            'rombel'=>$siswa['rombel'],
            'rayon'=>$siswa['rayon'],
            'tanggal'=>$request['tanggal'],
            'pukul'=>$request['pukul'],
            'suhutubuh'=>$request['suhutubuh'],
            'tensi'=>$request['tensi'],
            'diagnosa'=>$request['diagnosa'],
            'keterangan'=>$request['keterangan'],
        ]);

        return redirect('/sakit')->with('status','Data Berhasil Ditambahkan');
        // return $siswa;
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
    public function edit(InputS $sakit)
    {
      
        $dataSiswa = dataSiswa::all();
        return view('sakit.edit',compact('dataSiswa','sakit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InputS $sakit)
    {
        $siswa = dataSiswa::where('nis',$request->nis)->first();
        $request->validate([
            'nis'=>'required',
            'nama'=>'required',
            'JK'=>'required',
            'rombel'=>'required',
            'rayon'=>'required',
            'tanggal'=>'required',
            'pukul'=>'required',
            'suhutubuh'=>'required',
            'tensi'=>'required',
            'diagnosa'=>'required',
            'keterangan'=>'required'
        ]);

        InputS::update([
            'nis'=>$siswa['nis'],
            'nama'=>$siswa['nama'],
            'JK'=>$siswa['JK'],
            'rombel'=>$siswa['rombel'],
            'rayon'=>$siswa['rayon'],
            'tanggal'=>$request['tanggal'],
            'pukul'=>$request['pukul'],
            'suhutubuh'=>$request['suhutubuh'],
            'tensi'=>$request['tensi'],
            'diagnosa'=>$request['diagnosa'],
            'keterangan'=>$request['keterangan'],
        ]);

  
        return redirect()->route('sakit.index')
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
        $sakit=InputS::where('nis',$nis)->first();
        $sakit->delete();

        return redirect()->route('sakit.index')
        ->with('success','Berhasil Hapus !');
    }
}