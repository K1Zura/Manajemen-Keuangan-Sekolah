<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\kategoriPembayaran;

class KategoriPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            if ($request->ajax()) {
                $data = kategoriPembayaran::select('kategori_pembayarans.*','tahun_ajarans.tahun_ajaran')
                ->leftJoin('tahun_ajarans', 'kategori_pembayarans.tahun_ajaran_id', '=', 'tahun_ajarans.id')
                ->latest()
                ->distinct()
                ->get();
                return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editKategoriPembayaran"><i class="mdi mdi-table-edit"></i></a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteKategoriPembayaran"><i class="mdi mdi-delete"></i></a>';
                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
                }
        }return view('data-master/kategori-pembayaran');
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
        kategoriPembayaran::updateOrCreate([
            'id' => $request->pembayaran_id
        ],
        [
            'kategori' => $request->kategori,
            'tahun_ajaran_id' => $request->tahun_ajaran_id,
            'nominal' => $request->nominal,
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
        $kategoriPembayaran = kategoriPembayaran::findOrFail($id);
        return response()->json($kategoriPembayaran);
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
        kategoriPembayaran::findOrFail($id)->delete();

        return response()->json();
    }

    public function kategori(){
        $kategoriPembayaran = kategoriPembayaran::pluck('kategori', 'id');
        return response()->json($kategoriPembayaran);
    }
}
