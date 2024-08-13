<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Pembayaran;
use App\Models\pengeluaran;
use ArielMejiaDev\LarapexCharts\AreaChart;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class KeuanganHarianChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        $endDate = now();
        $startDate = now()->subDays(6);

        $pembayaranData = Pembayaran::whereBetween('tanggal', [$startDate, $endDate])
            ->orderBy('tanggal')
            ->get();

        $pengeluaranData = pengeluaran::whereBetween('tanggal', [$startDate, $endDate])
            ->orderBy('tanggal')
            ->get();

        $incomeData = [];
        $expenseData = [];
        $days = [];

        $groupedPembayarans = $pembayaranData->groupBy(function ($item) {
            return Carbon::parse($item->tanggal)->format('D, M, Y');
        });

        $groupedPengeluarans = $pengeluaranData->groupBy(function ($item) {
            return Carbon::parse($item->tanggal)->format('D, M, Y');
        });

        foreach ($groupedPembayarans as $day => $payments) {
            $days[] = $day;
            $incomeData[] = $payments->sum('nominal');
            $expenseData[] = $groupedPengeluarans->has($day) ? $groupedPengeluarans[$day]->sum('nominal') : 0;
        }

        return $this->chart->areaChart()
            ->setTitle('Keuangan Sekolah')
            ->setSubtitle('Harian')
            ->addData('Pendapatan', $incomeData)
            ->addData('Pengeluaran', $expenseData)
            ->setXAxis($days);
    }
}
