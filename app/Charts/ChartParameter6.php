<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Histori_kualitas;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChartParameter6
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($startDate = null, $endDate = null): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $startDate = is_string($startDate) ? Carbon::parse($startDate) : Carbon::now()->startOfYear();
        $endDate = is_string($endDate) ? Carbon::parse($endDate) : Carbon::now()->endOfYear();

    // Query to fetch the average value of the parameter grouped by month for the specified year
    $historiKualitas = Histori_kualitas::select(
        DB::raw("MONTH(waktu) as bulan"),
        DB::raw("AVG(nilai_parameter) as rata_rata_parameter")
    )
    ->whereBetween('waktu', [$startDate, $endDate])
    ->where('id_parameter', 3) // Only for a specific parameter id
    ->groupBy(DB::raw("MONTH(waktu)"))
    ->orderBy(DB::raw("MONTH(waktu)"))
    ->get();

    $bulanLabels = [];
    $rataRataParameter = [];

    foreach ($historiKualitas as $data) {
        $bulanLabel = date("F", mktime(0, 0, 0, $data->bulan, 1));
        $bulanLabels[] = $bulanLabel;
        $rataRataParameter[] = round($data->rata_rata_parameter, 2); // Use round function to ensure 2 decimal places
    }

    $allMonths = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    $rataRataParameterFull = array_fill(0, 12, 0);

    foreach ($bulanLabels as $index => $bulan) {
        $monthIndex = array_search($bulan, $allMonths);
        if ($monthIndex !== false) {
            $rataRataParameterFull[$monthIndex] = $rataRataParameter[$index];
        }
    }

    return $this->chart->lineChart()
        ->setTitle('Parameter SO2')
        ->setSubtitle("Rata-rata nilai parameter dari " . $startDate->format('d-m-Y') . " sampai " . $endDate->format('d-m-Y'))
        ->addData('Average Value', $rataRataParameterFull)
        ->setXAxis($allMonths)
        ->setHeight(300);
    }
}
