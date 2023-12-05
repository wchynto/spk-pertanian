<?php

namespace App\Http\Controllers;

use App\Models\AlternatifDesa;
use App\Models\Kriteria;
use App\Models\NilaiAlternatifDesa;
use Illuminate\Http\Request;

class PerhitunganMooraController extends Controller
{
    private function mooraColumnNormalization($column, String $column_name)
    {
        $result = 0;

        for ($i = 0; $i < count($column); $i++) {
            $result += pow($column[$i][$column_name], 2);
        }

        return pow($result, 0.5);
    }


    public function normalisasiView()
    {
        $nilai_alternatif = NilaiAlternatifDesa::all();

        $result = [];

        for ($i = 0; $i < count($nilai_alternatif); $i++) {
            $result[$i] = [
                'kode_alternatif_desa' => $nilai_alternatif[$i]->alternatifDesa->kode_alternatif_desa,
                'nama_desa' => $nilai_alternatif[$i]->alternatifDesa->nama_desa,
            ];
            for ($j = 0; $j < 5; $j++) {
                $result[$i]['nilai_c' . ($j + 1)] = [
                    'normalisasi' => $nilai_alternatif[$i]->{'nilai_c' . ($j + 1)} / $this->mooraColumnNormalization($nilai_alternatif, 'nilai_c' . ($j + 1))
                ];
            }
        }

        session([
            'result' => $result
        ]);

        return view('user.perhitungan_moora.normalisasi', [
            'title' => 'Normalisasi',
            'result' => $result
        ]);
    }

    public function normalisasiTerbobotView()
    {
        $kriteria = Kriteria::all();

        $result = session('result');

        for ($i = 0; $i < count($result); $i++) {
            for ($j = 1; $j <= 5; $j++) {

                $result[$i]['nilai_c' . "$j"]['optimasi'] = $result[$i]['nilai_c' . "$j"]['normalisasi'] * $kriteria[$j - 1]->bobot_nilai;
            }
        }

        session([
            'result' => $result
        ]);

        return view('user.perhitungan_moora.normalisasi_terbobot', [
            'title' => 'Normalisasi Terbobot',
            'result' => $result
        ]);
    }

    public function hasilAkhirView()
    {
        $result = session('result');

        for ($i = 0; $i < count($result); $i++) {
            $sum = 0;
            for ($j = 1; $j <= 5; $j++) {
                $sum += $result[$i]['nilai_c' . "$j"]['optimasi'];
            }
            $result[$i]['sum'] = $sum;
        }

        for ($i = 0; $i < count($result); $i++) {
            NilaiAlternatifDesa::where('kode_alternatif_desa', $result[$i]['kode_alternatif_desa'])->update([
                'hasil_perhitungan' => $result[$i]['sum']
            ]);
        }

        return view('user.perhitungan_moora.hasil_akhir', [
            'title' => 'Hasil Akhir',
            'alternatif_desa' => NilaiAlternatifDesa::all()->sortBy('hasil_perhitungan', SORT_REGULAR, true)
        ]);
    }
}
