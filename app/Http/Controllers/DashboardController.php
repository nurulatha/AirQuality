<?php

namespace App\Http\Controllers;


use App\Models\Histori_sampah;
use Illuminate\Http\Request;
use App\Charts\BarChart;
use App\Charts\GrafikChart;
use App\Charts\GrafikSampah;
use App\Charts\Dashboard1;
use App\Charts\Dashboard2;
use App\Charts\Dashboard3;
use App\Charts\Dashboard4;
use App\Charts\Dashboard5;
use App\Charts\SampahChart;
use App\Models\Histori_kualitas;
use App\Models\parameter_kualitas_udara;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;


class DashboardController extends Controller{
    public function index(Dashboard1 $dashboard1, Dashboard2 $dashboard2, Dashboard3 $dashboard3, 
    Dashboard4 $dashboard4, Dashboard5 $dashboard5)
    {
        return view('dashboard.index',[
            'dashboard1' => $dashboard1->build(),
            'dashboard2' => $dashboard2->build(),
            'dashboard3' => $dashboard3->build(),
            'dashboard4' => $dashboard4->build(),
            'dashboard5' => $dashboard5->build()
        ]);
    }

    
}


