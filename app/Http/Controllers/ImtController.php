<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imt;

class ImtController extends Controller
{
    public function index()
    {
        $dataImt = Imt::all();
        return view ('admin.content.hitung_imt',['dataImt'=>$dataImt]);
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
        $final = '
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Tinggi Badan: ' . $tb . ' Cm<br>
            Berat Badan : ' . $bb . ' Kg<br>
            BMI         : ' . number_format($imt, 1) . '<br>
            Keterangan : Kurus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
         </div>
         ';

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
