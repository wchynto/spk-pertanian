<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.kecamatan.kecamatan', [
            'title' => 'Kelola Kecamatan',
            'kecamatan' => Kecamatan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kecamatan.kecamatan_create', [
            'title' => 'Tambah Kecamatan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_kecamatan' => 'required',
            'alamat_kecamatan' => 'required'
        ];

        $messages = [
            'nama_kecamatan.required' => 'Nama kecamatan tidak boleh kosong.',
            'alamat_kecamatan.required' => 'Alamat kecamatan tidak boleh kosong.'
        ];

        $validator =  Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('admin.kecamatan.create'))->with('error', $validator->errors()->first())->withInput($request->all);
        }

        Kecamatan::create([
            'kode_kecamatan' => uniqid(),
            'nama_kecamatan' => $request->nama_kecamatan,
            'alamat_kecamatan' => $request->alamat_kecamatan
        ]);

        return back()->with('success', 'Data kecamatan berhasil ditambahkan.');
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
    public function edit(string $id, Request $request)
    {
        return view('admin.kecamatan.kecamatan_edit', [
            'title' => 'Edit Kecamatan',
            'kecamatan' => Kecamatan::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'nama_kecamatan' => 'required',
            'alamat_kecamatan' => 'required'
        ];

        $messages = [
            'nama_kecamatan.required' => 'Nama kecamatan tidak boleh kosong.',
            'alamat_kecamatan.required' => 'Alamat kecamatan tidak boleh kosong.'
        ];

        $validator =  Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('admin.kecamatan.create'))->with('error', $validator->errors()->first())->withInput($request->all);
        }

        Kecamatan::find($id)->update([
            'nama_kecamatan' => $request->nama_kecamatan,
            'alamat_kecamatan' => $request->alamat_kecamatan
        ]);

        return back()->with('success', 'Data kecamatan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kecamatan::find($id)->delete();

        return back()->with('success', 'Data kecamatan berhasil dihapus.');
    }
}
