<?php

namespace App\Http\Controllers;

use App\Models\Histori_sampah;
use Illuminate\Http\Request;
use App\Charts\BarChart;
use App\Charts\GrafikChart;
use App\Charts\GrafikSampah;
use App\Charts\SampahChart;

class SampahController extends Controller
{
    public function index(SampahChart $chart,Request $request )
    {
        // $a = Histori_sampah::get()->pluck('waktu')->toArray();
        // return var_dump($a[0]);
        $histori_sampah = Histori_sampah::all();
        $rata_rata_volume = Histori_sampah::avg('volume');
        $rata_rata_ketinggian = Histori_sampah::avg('ketinggian_sampah');
        $grafikSampah = Histori_sampah::all();
        $startDate = $request->input('start_date', date('Y-m-t')); // Tanggal mulai default: awal bulan saat ini
        $endDate = $request->input('end_date', date('Y-m-t'));

        return view('sampah.index', [
            
            'histori_sampah' => $chart->build($startDate,$endDate),
            'histori' => Histori_sampah::all()
        ]);
    }

    public function chart()
    {
        $histori_sampah = Histori_sampah::all();
        return view('barChart', compact('histori_sampah'));
    }

    public function fetchChartData()
    {
        $histori_sampah = Histori_sampah::all();

        $labels = $histori_sampah->pluck('waktu')->toJson();
        $ketinggian_sampah = $histori_sampah->pluck('ketinggian_sampah')->toJson();
        $volume_sampah = $histori_sampah->pluck('volume_sampah')->toJson();

        return response()->json([
            'labels' => $labels,
            'ketinggian_sampah' => $ketinggian_sampah,
            'volume_sampah' => $volume_sampah,
        ]);
    }
}