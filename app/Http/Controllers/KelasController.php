<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            if ($request->ajax()) {
                $data = kelas::latest()->get();
                return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                       $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editKelas"><i class="mdi mdi-table-edit"></i></a>';
                       $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteKelas"><i class="mdi mdi-delete"></i></a>';
                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
                }
            }
        return view('data-master/kelas');
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
        kelas::updateOrCreate([
            'id' => $request->kelas_id,
        ],
        [
            'nama_kelas' => $request->nama_kelas,
        ]);
        return response()->json();
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
        $kelas = kelas::findOrFail($id);
        return response()->json($kelas);
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
        $kelas = kelas::findOrFail($id)->delete();
        return response()->json();
    }

    public function kelas(){
        $kelas = kelas::pluck('nama_kelas', 'id');
        return response()->json($kelas);
    }
}
