<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Subkriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubkriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.subkriteria.subkriteria', [
            'title' => 'Kelola Subkriteria',
            'subkriteria' => Subkriteria::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.subkriteria.subkriteria_create', [
            'title' => 'Tambah Subkriteria',
            'kriteria' => Kriteria::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'keterangan' => 'required',
            'nilai' => 'required|numeric',
            'kriteria' => 'required'
        ];

        $messages = [
            'keterangan.required' => 'Keterangan tidak boleh kosong',
            'nilai.required' => 'Nilai tidak boleh kosong',
            'nilai.numeric' => 'Nilai harus berupa angka',
            'kriteria.required' => 'Kriteria tidak boleh kosong'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first())->withInput($request->all());
        }

        Subkriteria::create([
            'kode_subkriteria' => uniqid(),
            'keterangan' => $request->keterangan,
            'nilai' => $request->nilai,
            'kode_kriteria' => $request->kriteria
        ]);

        return back()->with('success', 'Data subkriteria berhasil ditambahkan.');
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
        return view('admin.subkriteria.subkriteria_edit', [
            'title' => 'Edit Subkriteria',
            'subkriteria' => Subkriteria::find($id),
            'kriteria' => Kriteria::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'keterangan' => 'required',
            'nilai' => 'required|numeric',
            'kriteria' => 'required'
        ];

        $messages = [
            'keterangan.required' => 'Keterangan tidak boleh kosong',
            'nilai.required' => 'Nilai tidak boleh kosong',
            'nilai.numeric' => 'Nilai harus berupa angka',
            'kriteria.required' => 'Kriteria tidak boleh kosong'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first())->withInput($request->all());
        }

        Subkriteria::find($id)->update([
            'keterangan' => $request->keterangan,
            'nilai' => $request->nilai,
            'kode_kriteria' => $request->kriteria
        ]);

        return back()->with('success', 'Data subkriteria berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Subkriteria::find($id)->delete();

        return back()->with('success', 'Data subkriteria berhasil dihapus.');
    }
}
