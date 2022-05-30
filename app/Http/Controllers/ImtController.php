<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imt;
use App\Http\Controllers\Controller;

class ImtController extends Controller
{
    public function index()
    {
        $dataImt = Imt::all();
        //dd($dataImt);
        return view ('admin/content/hitung_imt' , compact('dataImt'));
    }

    public function hitung(Request $request)
    {
        request()->validate(
            [
                'nis' => 'required',
                'nama' => 'required',
                'rombel' => 'required',
                'rayon' => 'required',
                'tb' => 'required',
                'bb' => 'required',

            ]
        );
        $tb = $request->tb;
        $bb = $request->bb;
        $tinggib = $tb / 100;
        $imt = $bb / ($tinggib * $tinggib);
        $final = '<div style="backgroundcolor: #white;"
            Tinggi Badan: ' . $tb . ' Cm<br>
            Berat Badan : ' . $bb . ' Kg<br>
            BMI         : ' . number_format($imt, 1) . '<br>
            Keterangan : Kurus
         </div>';

        if ($imt <= 18.4) {
            $HASILIMT = "kurus";
        } elseif ($imt <= 25) {
            $HASILIMT = "normal";
        } elseif ($imt <= 27) {
            $HASILIMT = "gemuk";
        } elseif ($imt > 27) {
            $HASILIMT = "obesitas";
        }
        Imt::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'rombel' => $request->rombel,
            'rayon' => $request->rayon,
            'tb' => $request->tb,
            'bb' => $request->bb,
            'hasil_imt' => $HASILIMT
        ]);
        return redirect('siswa_imt')->with('success', $final);
    }
}
