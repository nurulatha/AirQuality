<?php

namespace App\Http\Controllers;

use App\Charts\Parameter2;
use App\Models\Histori_sampah;
use Illuminate\Http\Request;
use App\Charts\BarChart;
use App\Charts\GrafikChart;
use App\Charts\GrafikSampah;
use App\Charts\SampahChart;
use App\Charts\Parameter1;

class MonitoringController extends Controller
{
    
    
    public function index(Parameter1 $parameter1, Parameter2 $parameter2)
    {
        $histori_sampah = Histori_sampah::all();
        $rata_rata_volume = Histori_sampah::whereYear('waktu', '=', date('Y'))
        ->avg('volume');

        $rata_rata_volume = number_format($rata_rata_volume, 2);

        $rata_rata_ketinggian = Histori_sampah::whereYear('waktu', '=', date('Y'))
        ->avg('ketinggian_sampah');
        $rata_rata_ketinggian = number_format($rata_rata_ketinggian, 2);

        return view('monitoring.index',[
            'rata_rata_volume' => $rata_rata_volume,
            'rata_rata_ketinggian' => $rata_rata_ketinggian,
            'parameter1' => $parameter1->build(),
            'parameter2' => $parameter2->build()
        ]);
    }
    
}