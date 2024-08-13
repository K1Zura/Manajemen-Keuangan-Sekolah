<?php

namespace App\Http\Controllers;

use App\Models\pembayaran;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(request()->ajax()){
            if ($request->ajax()) {
                $data = pembayaran::select(
                    'pembayarans.*',
                    'kategori_pembayarans.kategori',
                    'siswas.nis',
                    'siswas.nama',
                    'siswas.kelas_id',
                    'siswas.tahun_ajaran_id',
                    'kelas.nama_kelas',
                    'tahun_ajarans.tahun_ajaran'
                )
                    ->leftJoin('siswas', 'pembayarans.siswa_id', '=', 'siswas.id')
                    ->leftJoin('kelas', 'siswas.kelas_id', '=', 'kelas.id')
                    ->leftJoin('tahun_ajarans', 'siswas.tahun_ajaran_id', '=', 'tahun_ajarans.id')
                    ->leftJoin('kategori_pembayarans', 'pembayarans.kategori_pembayaran_id', '=', 'kategori_pembayarans.id')
                    ->latest()
                    ->distinct()
                    ->get();

                return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function ($row) {
                            $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editPembayaran"><i class="mdi mdi-table-edit"></i></a>';
                            if ($row->validasi != 1) {
                                $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Validasi" class="btn btn-secondary btn-sm validasiPembayaran"><i class="mdi mdi-briefcase-check"></i></a>';
                            }

                            $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deletePembayaran"><i class="mdi mdi-delete"></i></a>';

                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }

        }
        return view('/pembayaran');
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
        pembayaran::updateOrCreate([
            'id' => $request->bayar_id
        ],
        [
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $request->kelas_id,
            'tahun_ajaran_id'=> $request->tahun_ajaran_id,
            'kategori_pembayaran_id'=> $request->kategori_pembayaran_id,
            'validasi'=> $request->validasi,
            'nominal'=> $request->nominal,
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
        $pembayaran = pembayaran::findOrFail($id);
        return response()->json($pembayaran);
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
        pembayaran::findOrFail($id)->delete();

        return response()->json();
    }

    public function validatePayment($id)
    {
        $pembayaran = pembayaran::findOrFail($id);
        $pembayaran->update(['validasi' => 1]);

        return response()->json(['message' => 'Validation successful']);
    }
}
