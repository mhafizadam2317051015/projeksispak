<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;
use App\Models\Penyakit;

class DiagnosaController extends Controller
{
    /**
     * TAMPILKAN FORM DIAGNOSA (dulu: form)
     */
    public function index()
    {
        $gejalas = Gejala::orderBy('kode')->get();
        return view('diagnosa.index', compact('gejalas'));
    }

    /**
     * PROSES HASIL DIAGNOSA (dulu: proses)
     */
    public function hasil(Request $request)
    {
        $request->validate([
            'gejala' => 'required|array|min:1'
        ]);

        $input = $request->gejala; // kode gejala yg dipilih user

        // Ambil gejala dipilih user untuk ditampilkan
        $gejalaDipilih = Gejala::whereIn('kode', $input)->get();

        // Hitung kecocokan penyakit
        $hasil = Penyakit::with('gejalas')->get()->map(function($p) use ($input) {

            $total = $p->gejalas->count();
            $cocok = $p->gejalas->whereIn('kode', $input)->count();

            $score = $total > 0 ? ($cocok / $total) * 100 : 0;

            return [
                'penyakit' => $p,
                'score'    => round($score, 2),
                'cocok'    => $cocok,
                'total'    => $total,
            ];
        })
        ->sortByDesc('score')
        ->first();

        return view('diagnosa.hasil', [
            'hasil'         => $hasil,
            'gejalaDipilih' => $gejalaDipilih,
        ]);
    }
}
