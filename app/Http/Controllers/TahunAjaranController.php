<?php

namespace App\Http\Controllers;

use App\Models\tahunAjaran;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            if ($request->ajax()) {
                $data = tahunAjaran::latest()->get();
                return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                       $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editTahunAjaran"><i class="mdi mdi-table-edit"></i></a>';
                       $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteTahunAjaran"><i class="mdi mdi-delete"></i></a>';
                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
                }
            }
        return view('data-master/tahun-ajaran');
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
        tahunAjaran::updateOrCreate([
            'id' => $request->tahunAjaran_id
        ],
        [
            'tahun_ajaran' => $request->tahun_ajaran,
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
        $tahunAjaran = tahunAjaran::findOrFail($id);
        return response()->json($tahunAjaran);
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
        tahunAjaran::findOrFail($id)->delete();

        return response()->json();
    }

    public function tahun_ajaran(){
        $tahunAjaran = tahunAjaran::pluck('tahun_ajaran', 'id');
        return response()->json($tahunAjaran);
    }
    
}
