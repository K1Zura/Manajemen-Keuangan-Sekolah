<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::get();
        return response()->json(['siswa' => $siswa], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'kelas' => 'required|string',
            // tambahkan validasi sesuai kebutuhan
        ]);

        $siswa = Siswa::create($request->all());

        return response()->json(['siswa' => $siswa], 201);
    }
}
