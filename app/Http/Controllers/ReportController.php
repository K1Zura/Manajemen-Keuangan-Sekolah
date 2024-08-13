<?php

namespace App\Http\Controllers;

use PDF;
use Excel;
use App\Models\pembayaran;
use Illuminate\Http\Request;
use App\Exports\pembayaranExport;

class ReportController extends Controller
{
    public function cetakPDF(Request $request)
    {
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');
        $format = $request->input('format');

        $pembayaran = pembayaran::select(
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
                ->whereBetween('pembayarans.tanggal', [$tanggalMulai, $tanggalSelesai])
                ->latest()
                ->distinct()
                ->get();

        return view('cetak-pdf', ['pembayaran' => $pembayaran]);
    }

    public function downloadPDF(Request $request)
    {
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');
        $format = $request->input('format');

        $pembayaran = pembayaran::select(
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
            ->whereBetween('pembayarans.tanggal', [$tanggalMulai, $tanggalSelesai])
            ->latest()
            ->distinct()
            ->get();

            if ($format == 'pdf') {
                $pdf = PDF::loadView('cetak-pdf', ['pembayaran' => $pembayaran]);

                return $pdf->stream('Pembayaran.pdf');
            } elseif ($format == 'excel') {
                $data = pembayaran::all();

                $fileName = 'pembayaran.xlsx';

                return Excel::download(new pembayaranExport($data), $fileName);
            }
    }

    public function printPDF(Request $request)
    {
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');
        $format = $request->input('format');

        $pembayaran = pembayaran::select(
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
                ->whereBetween('pembayarans.tanggal', [$tanggalMulai, $tanggalSelesai])
                ->latest()->distinct()->get();

    return view('print-pembayaran', ['pembayaran' => $pembayaran]);
}

}
