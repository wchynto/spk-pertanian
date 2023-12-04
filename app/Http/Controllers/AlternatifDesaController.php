<?php

namespace App\Http\Controllers;

use App\Models\AlternatifDesa;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlternatifDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.alternatif_desa.alternatif_desa', [
            'title' => 'Kelola Alternatif Desa',
            'alternatif_desa' => AlternatifDesa::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.alternatif_desa.alternatif_desa_create', [
            'title' => 'Tambah Alternatif Desa',
            'kecamatan' => Kecamatan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_desa' => 'required',
            'luas_tanah' => 'required',
            'kecamatan' => 'required'
        ];

        $messages = [
            'nama_desa.required' => 'Nama desa tidak boleh kosong.',
            'luas_tanah.required' => 'Luas tanah tidak boleh kosong.',
            'kode_kecamatan.required' => 'Kode kecamatan tidak boleh kosong.'
        ];

        $validator =  Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('admin.alternatif-desa.create'))->with('error', $validator->errors()->first())->withInput($request->all);
        }

        AlternatifDesa::create([
            'kode_alternatif_desa' => uniqid(),
            'nama_desa' => $request->nama_desa,
            'luas_tanah' => $request->luas_tanah,
            'kode_kecamatan' => $request->kecamatan
        ]);

        return back()->with('success', 'Data alternatif desa berhasil ditambahkan.');
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
        return view('admin.alternatif_desa.alternatif_desa_edit', [
            'title' => 'Edit Alternatif Desa',
            'alternatif_desa' => AlternatifDesa::find($id),
            'kecamatan' => Kecamatan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'nama_desa' => 'required',
            'luas_tanah' => 'required',
            'kecamatan' => 'required'
        ];

        $messages = [
            'nama_desa.required' => 'Nama desa tidak boleh kosong.',
            'luas_tanah.required' => 'Luas tanah tidak boleh kosong.',
            'kecamatan.required' => 'Kode kecamatan tidak boleh kosong.'
        ];

        $validator =  Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('admin.alternatif-desa.create'))->with('error', $validator->errors()->first())->withInput($request->all);
        }

        AlternatifDesa::find($id)->update([
            'nama_desa' => $request->nama_desa,
            'luas_tanah' => $request->luas_tanah,
            'kode_kecamatan' => $request->kecamatan
        ]);

        return back()->with('success', 'Data alternatif desa berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        AlternatifDesa::find($id)->delete();

        return back()->with('success', 'Data alternatif desa berhasil dihapus.');
    }
}
