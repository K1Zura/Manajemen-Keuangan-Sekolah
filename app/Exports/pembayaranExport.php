<?php

namespace App\Exports;

use App\Models\Pembayaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PembayaranExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        $request = request();
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');
        $format = $request->input('format');

        return Pembayaran::select(
            'pembayarans.id',
            'kategori_pembayarans.kategori',
            'siswas.nis',
            'siswas.nama',
            'kelas.nama_kelas',
            'tahun_ajarans.tahun_ajaran',
            'pembayarans.nominal',
            'pembayarans.tanggal',
        )
            ->leftJoin('siswas', 'pembayarans.siswa_id', '=', 'siswas.id')
            ->leftJoin('kelas', 'siswas.kelas_id', '=', 'kelas.id')
            ->leftJoin('tahun_ajarans', 'siswas.tahun_ajaran_id', '=', 'tahun_ajarans.id')
            ->leftJoin('kategori_pembayarans', 'pembayarans.kategori_pembayaran_id', '=', 'kategori_pembayarans.id')
            ->whereBetween('pembayarans.tanggal', [$tanggalMulai, $tanggalSelesai])
            ->orderBy('pembayarans.created_at', 'desc')
            ->get();
    }


    public function headings(): array
    {
        return [
            'ID',
            'Kategori',
            'NIS',
            'Siswa',
            'Kelas',
            'Tahun Ajaran',
            'Nominal',
            'Tanggal',
        ];
    }
}
