<?php

namespace App\Http\Controllers;


use App\Models\Histori_kualitas;
use App\Models\parameter_kualitas_udara;
use App\Models\referensi_alat;
use App\Models\kawasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use App\Charts\GrafikChart;
use App\Charts\ChartParameter1;
use App\Charts\ChartParameter2;
use App\Charts\ChartParameter3;
use App\Charts\ChartParameter4;
use App\Charts\ChartParameter5;
use App\Charts\ChartParameter6;


class UdaraController extends Controller
{
    
    public function index(GrafikChart $chart, ChartParameter1 $chartParameter1, ChartParameter2 $chartParameter2,
    ChartParameter3 $chartParameter3, ChartParameter4 $chartParameter4, ChartParameter5 $chartParameter5, ChartParameter6 $chartParameter6, Request $request)
    {
        $histori_kualitas = Histori_kualitas::with('parameter_kualitas_udara')->get();
        //$histori_kualitas2 = Histori_kualitas::with('referensi_alat.kawasan')->get();
        $parameter_kualitas_udara = parameter_kualitas_udara::all();
        $startDate = $request->input('start_date', date('Y-m-t')); 
        $endDate = $request->input('end_date', date('Y-m-t'));

        return view('udara.index', [
            'chartParameter1' => $chartParameter1->build($startDate, $endDate),
            'chartParameter2' => $chartParameter2->build($startDate, $endDate),
            'chartParameter3' => $chartParameter3->build($startDate, $endDate),
            'chartParameter4' => $chartParameter4->build($startDate, $endDate),
            'chartParameter5' => $chartParameter5->build($startDate, $endDate),
            'chartParameter6' => $chartParameter6->build($startDate, $endDate),
            'histori_kualitas' => $histori_kualitas // Masukkan variabel histori_sampah ke dalam array data yang dikirimkan ke view
        ]);

    }

    public function chart()
    {
        $chartParameters = [];
        $idParameters = [1, 2, 3, 4, 5, 6]; // Contoh ID parameter yang berbeda
    
        foreach ($idParameters as $idParameter) {
            $chartParameters[] = Histori_kualitas::where('id_parameter', $idParameter)->pluck('nilai_parameter');
        }

        return view('lineChart', compact('histori_kualitas'));
    }

    
}
