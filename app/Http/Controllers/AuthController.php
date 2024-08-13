<?php

namespace App\Http\Controllers;

use App\Models\pembayaran;
use Illuminate\Http\Request;
use App\Charts\KeuanganHarianChart;
use Illuminate\Support\Facades\Auth;
use App\Models\pengeluaran;
use PDF;
use Excel;
use App\Exports\pembayaranExport;

class AuthController extends Controller
{
    public function index(){
        $belumValidasiCount = pembayaran::where('validasi', '0')->count();
        $sudahValidasiCount = pembayaran::where('validasi', '1')->count();
        $jumlah = pembayaran::count('siswa_id');

        return view('/home', compact('belumValidasiCount', 'sudahValidasiCount', 'jumlah'));
    }
    public function keuangan(KeuanganHarianChart $chart) {
        $pembayaran = Pembayaran::select(
            'pembayarans.*',
            'kategori_pembayarans.kategori'
        )
            ->leftJoin('kategori_pembayarans', 'pembayarans.kategori_pembayaran_id', '=', 'kategori_pembayarans.id')
            ->take(10)
            ->get();

        $pengeluaran = Pengeluaran::take(10)->get();

        return view('keuangan', [
            'chart' => $chart->build(),
            'pembayaran' => $pembayaran,
            'pengeluaran' => $pengeluaran
        ]);
    }
    public function laporan(Request $request){
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
                ->get();

            if ($format == 'pdf') {
                $pdf = PDF::loadView('cetak-pdf', ['pembayaran' => $pembayaran]);

                return $pdf->download('Pembayaran.pdf');
            } elseif ($format == 'excel') {
                $data = pembayaran::all();

                $fileName = 'pembayaran.xlsx';

                return Excel::download(new pembayaranExport($data), $fileName);
            }
        return view('/laporan', ['pembayaran' => $pembayaran]);
    }
    public function login(){
        return view('/login');
    }
    public function auth(request $request){
        $request->validate([
            'email'=>['required'],
            'password'=>['required'],
        ]);
        $infologin=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        if (Auth::attempt($infologin)) {
            return redirect('/');
        }else {
            return redirect('/login');
        }
    }

    public function logout(request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
