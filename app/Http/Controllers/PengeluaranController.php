<?php

namespace App\Http\Controllers;

use App\Models\pengeluaran;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            if ($request->ajax()) {
                $data = pengeluaran::latest()->get();
                return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                       $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editPengeluaran"><i class="mdi mdi-table-edit"></i></a>';
                       $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deletePengeluaran"><i class="mdi mdi-delete"></i></a>';
                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
                }
            }
        return view('/pengeluaran');
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
        pengeluaran::updateOrCreate([
            'id' => $request->pengeluaran_id
        ],
        [
            'alasan' => $request->alasan,
            'nominal' => $request->nominal,
            'tanggal'=> $request->tanggal,
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
        $pengeluaran = pengeluaran::findOrFail($id);
        return response()->json($pengeluaran);
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
        pengeluaran::findOrFail($id)->delete();

        return response()->json();
    }
}
