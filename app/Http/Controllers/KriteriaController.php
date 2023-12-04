<?php
// TODO: Membuat dan perbaiki algoritma pada fungsi store dan update kriteria

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.kriteria.kriteria', [
            'title' => 'Kelola Kriteria',
            'kriteria' => Kriteria::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kriteria.kriteria_create', [
            'title' => 'Tambah Kriteria',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_kriteria' => 'required',
            'bobot_nilai' => 'required|numeric',
            'jenis_kriteria' => 'required'
        ];

        $messages = [
            'nama_kriteria.required' => 'Nama kriteria tidak boleh kosong.',
            'bobot_nilai.required' => 'Bobot kriteria tidak boleh kosong.',
            'jenis_kriteria.required' => 'Jenis kriteria tidak boleh kosong.',
            'bobot_nilai.numeric' => 'Bobot kriteria harus berupa angka.'
        ];

        $validator =  Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('admin.kriteria.create'))->with('error', $validator->errors()->first())->withInput($request->all);
        }

        Kriteria::create([
            'kode_kriteria' => uniqid(),
            'nama_kriteria' => $request->nama_kriteria,
            'bobot_nilai' => $request->bobot_nilai,
            'jenis_kriteria' => $request->jenis_kriteria,
        ]);

        return back()->with('success', 'Data kriteria berhasil ditambahkan.');
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
        return view('admin.kriteria.kriteria_edit', [
            'title' => 'Edit Kriteria',
            'kriteria' => Kriteria::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'nama_kriteria' => 'required',
            'bobot_nilai' => 'required|numeric',
            'jenis_kriteria' => 'required'
        ];

        $messages = [
            'nama_kriteria.required' => 'Nama kriteria tidak boleh kosong.',
            'bobot_nilai.required' => 'Bobot kriteria tidak boleh kosong.',
            'jenis_krit,eria.required' => 'Jenis kriteria tidak boleh kosong.',
            'bobot_nilai.numeric' => 'Bobot kriteria harus berupa angka.'
        ];

        $validator =  Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('admin.kriteria.create'))->with('error', $validator->errors()->first())->withInput($request->all);
        }

        Kriteria::find($id)->update([
            'nama_kriteria' => $request->nama_kriteria,
            'bobot_nilai' => $request->bobot_nilai,
            'jenis_kriteria' => $request->jenis_kriteria,
        ]);

        return back()->with('success', 'Data kriteria berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kriteria::find($id)->delete();

        return back()->with('success', 'Data kriteria berhasil dihapus.');
    }
}
