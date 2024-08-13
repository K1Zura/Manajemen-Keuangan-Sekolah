<?php

namespace App\Http\Controllers;

use Excel;
use App\Models\pembayaran;
use Illuminate\Http\Request;
use App\Exports\pembayaranExport;

class ExcelController extends Controller
{
    public function export()
    {
        // Ambil data yang akan diekspor, misalnya dari model
        $data = pembayaran::all();

        // Tentukan nama file Excel
        $fileName = 'pembayaran.xlsx';

        // Export data ke dalam Excel
        return Excel::download(new pembayaranExport($data), $fileName);
    }
}
