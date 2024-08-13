<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Ramsey\Uuid\Rfc4122\Validator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(request()->ajax()){
            if ($request->ajax()) {
                $data = siswa::select('siswas.*', 'kelas.nama_kelas', 'tahun_ajarans.tahun_ajaran')
                ->leftJoin('kelas', 'siswas.kelas_id', '=', 'kelas.id')
                ->leftJoin('tahun_ajarans', 'siswas.tahun_ajaran_id', '=', 'tahun_ajarans.id')
                ->latest()
                ->distinct()
                ->get();
                return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                               $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editSiswa"><i class="mdi mdi-table-edit"></i></a>';
                               $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteSiswa"><i class="mdi mdi-delete"></i></a>';
                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }

        }return view('data-master/siswa');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validator = $request->validate(
        [
            'nis' => 'required|unique:siswas',
            'nama' => 'required',
        ],
        [
            'nis.required' => 'NIS is required',
            'nis.unique' => 'NIS already exists',
            'nama.required' => 'Nama is required',
        ]
    );

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

        siswa::updateOrCreate([
            'id' => $request->siswa_id
        ], [
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas_id' => $request->kelas_id,
            'tahun_ajaran_id' => $request->tahun_ajaran_id,
        ]);

        return response()->json(['message' => 'Success!'], 200);
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
        $siswa = siswa::findOrFail($id);
        return response()->json($siswa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        siswa::findOrFail($id)->delete();

        return response()->json();
    }

    public function siswa(){
        $siswaData = siswa::select('siswas.*', 'kelas.nama_kelas', 'tahun_ajarans.tahun_ajaran')
            ->leftJoin('kelas', 'siswas.kelas_id', '=', 'kelas.id')
            ->leftJoin('tahun_ajarans', 'siswas.tahun_ajaran_id', '=', 'tahun_ajarans.id')
            ->get();

        $siswa = $siswaData->map(function ($item) {
            return [
                'id' => $item->id,
                'text' => $item->nis . ' | ' . $item->nama . ' | ' . $item->nama_kelas . ' | ' . $item->tahun_ajaran,
            ];
        })->pluck('text', 'id');

        return response()->json($siswa);
    }


}
