@extends('layouts.app')
@section('js')
    <script src="{{ $parameter1->cdn() }}"></script>
    {{ $parameter1->script() }}

    <script src="{{ $parameter2->cdn() }}"></script>
    {{ $parameter2->script() }}
@endsection
@push('css')
    <!-- Style -->
    <style>
        .inner p strong {
            font-weight: bold;
            font-size: 18px;
        }

        .inner h3 {
            font-size: 20px;
        }

        /* Warna latar belakang dan teks untuk setiap kotak */
        .small-box {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 10px;
            border-radius: 10px;
        }

        .bg-volume {
            background-color: #5BA8A0; /* Warna biru */
            color: #fff; /* Warna teks putih */
        }

        .bg-ketinggian {
            background-color: #28a745; /* Warna hijau */
            color: #fff; /* Warna teks putih */
        }

        .bg-ratarata{
            background-color: #CBE54E; /* Warna kuning */
            color: #fff; /* Warna teks hitam */
        }


        /* Style untuk small box footer */
        .small-box-footer {
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.2); /* Warna latar belakang transparan */
            color: #fff; /* Warna teks putih */
            font-size: 20px;
        }

        .card.card-primary.card-outline {
            border-color: #343A40;
        }
    </style>
@endpush
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 text-uppercase">
            <h4 class="m-0" style="font-weight: bold; font-size: 2em;">Monitoring</h4>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <!--Small boxes (Start box)-->
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="small-box bg-volume">
                    <div class="inner">
                        <p><strong>Volume Sampah</strong></p>
                        <h3>{{ $rata_rata_volume }}</h3>
                    </div>
                    <div class="small-box-footer">
                        (ton/tahun)
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="small-box bg-ketinggian">
                    <div class="inner">
                        <p><strong>Ketinggian Sampah</strong></p>
                        <h3>{{ $rata_rata_ketinggian }}</h3>
                    </div>
                    <div class="small-box-footer">
                        (meter/tahun)
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="small-box bg-ratarata">
                    <div class="inner">
                        <p><strong>Rata-Rata Sampah</strong></p>
                        <h3>16.15<sup style="font-size: 20px">%</sup></h3>
                    </div>
                    <div class="small-box-footer">
                        (ton/tahun)
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Filter dan Bar Chart dalam satu Card -->
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="card d-flex justify-content-end">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Bar "Kualitas Udara" -->
                            <div class="col-sm-12 col-md-6">
                                <div class="card card-black">
                                    <div class="card-header bg-black">
                                        <h3 class="card-title">
                                            <i class="far fa-chart-bar"></i>
                                            Kualitas Udara
                                        </h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                    {!! $parameter1->container() !!}
                                    </div>
                                </div>
                            </div>
                            <!-- Bar Chart "Volume dan Ketinggian Sampah" -->
                            <div class="col-sm-12 col-md-6">
                                <div class="card card-black">
                                    <div class="card-header bg-black">
                                        <h3 class="card-title">
                                            <i class="far fa-chart-bar"></i>
                                            Volume dan Ketinggian Sampah
                                        </h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                    {!! $parameter2->container() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table di bawah grafik -->
                        <div class="row mt-3">
                            <div class="col-md-12">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
