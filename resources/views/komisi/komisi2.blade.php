@extends('layouts.app')

@section('content')
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Datatable</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Datatable</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Export</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr class="text-center"></a>
                                        <th>Nama</th>
                                        <th>P3MI</th>
                                        <th>Konfirmasi Pada</th>
                                        <th>Konfirmasi Oleh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($member as $a)
                                    <tr>
                                        <td>{{ $a->nama }}</td>
                                        <td>{{ $a->company['nama'] }}</td>
                                        <td class="text-center">  
                                          <p class="text-success">
                                            {{ Carbon\Carbon::parse($a->komisi_confirm_at)->format("D") }}
                                           | {{ Carbon\Carbon::parse($a->komisi_confirm_at)->format("d/M/Y") }} | {{ Carbon\Carbon::parse($a->komisi_confirm_at)->format("H:i") }}
                                          </p>
                                        </td>
                                        <td class="text-center">
                                          <p class="text-success">{{ strtoupper($a->komisi_confirm) }}</p>
                                        </td>
                                    </tr>
                                    @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection
