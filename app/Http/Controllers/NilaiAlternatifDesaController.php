<?php

namespace App\Http\Controllers;

use App\Models\AlternatifDesa;
use App\Models\NilaiAlternatifDesa;
use App\Models\Subkriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NilaiAlternatifDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.nilai_alternatif_desa.nilai_alternatif_desa', [
            'title' => 'Kelola Nilai Alternatif Desa',
            'nilai_alternatif_desa' => NilaiAlternatifDesa::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.nilai_alternatif_desa.nilai_alternatif_desa_create', [
            'title' => 'Tambah Nilai Alternatif Desa',
            'desa' => AlternatifDesa::all(),
            'ketinggian_tempat' => Subkriteria::where('kode_kriteria', '656df4265f94f')->get(),
            'curah_hujan' => Subkriteria::where('kode_kriteria', '656e1b2e59c54')->get(),
            'suhu' => Subkriteria::where('kode_kriteria', '656e1b49ee7ac')->get(),
            'ph_tanah' => Subkriteria::where('kode_kriteria', '656e1b7732f9d')->get(),
            'tekstur_tanah' => Subkriteria::where('kode_kriteria', '656e1b87576a9')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'desa' => 'required',
            'c1' => 'required',
            'c2' => 'required',
            'c3' => 'required',
            'c4' => 'required',
            'c5' => 'required',
        ];

        $messages = [
            'desa.required' => 'Desa harus diisi.',
            'c1.required' => 'Ketinggian tempat harus diisi.',
            'c2.required' => 'Curah hujan harus diisi.',
            'c3.required' => 'Suhu harus diisi.',
            'c4.required' => 'pH tanah harus diisi.',
            'c5.required' => 'Tekstur tanah harus diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->first())->withInput($request->all());
        }

        NilaiAlternatifDesa::create([
            'kode_nilai_alternatif_desa' => uniqid(),
            'nilai_c1' => $request->c1,
            'nilai_c2' => $request->c2,
            'nilai_c3' => $request->c3,
            'nilai_c4' => $request->c4,
            'nilai_c5' => $request->c5,
            'kode_alternatif_desa' => $request->desa,
        ]);

        return back()->with('success', 'Data nilai alternatif desa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('user.nilai_alternatif_desa.nilai_alternatif_desa_edit', [
            'title' => 'Edit Nilai Alternatif Desa',
            'nilai_alternatif_desa' => NilaiAlternatifDesa::find($id),
            'desa' => AlternatifDesa::all(),
            'ketinggian_tempat' => Subkriteria::where('kode_kriteria', '656df4265f94f')->get(),
            'curah_hujan' => Subkriteria::where('kode_kriteria', '656e1b2e59c54')->get(),
            'suhu' => Subkriteria::where('kode_kriteria', '656e1b49ee7ac')->get(),
            'ph_tanah' => Subkriteria::where('kode_kriteria', '656e1b7732f9d')->get(),
            'tekstur_tanah' => Subkriteria::where('kode_kriteria', '656e1b87576a9')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'desa' => 'required',
            'c1' => 'required',
            'c2' => 'required',
            'c3' => 'required',
            'c4' => 'required',
            'c5' => 'required',
        ];

        $messages = [
            'desa.required' => 'Desa harus diisi.',
            'c1.required' => 'Ketinggian tempat harus diisi.',
            'c2.required' => 'Curah hujan harus diisi.',
            'c3.required' => 'Suhu harus diisi.',
            'c4.required' => 'pH tanah harus diisi.',
            'c5.required' => 'Tekstur tanah harus diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->first())->withInput($request->all());
        }

        NilaiAlternatifDesa::find($id)->update([
            'nilai_c1' => $request->c1,
            'nilai_c2' => $request->c2,
            'nilai_c3' => $request->c3,
            'nilai_c4' => $request->c4,
            'nilai_c5' => $request->c5,
            'kode_alternatif_desa' => $request->desa,
        ]);

        return back()->with('success', 'Data nilai alternatif desa berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        NilaiAlternatifDesa::find($id)->delete();

        return back()->with('success', 'Data nilai alternatif desa berhasil dihapus.');
    }
}
