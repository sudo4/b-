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
                            <a href="{{route('member.create')}}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>

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
                                        <th>No. Handphone</th>
                                        <th>Kehadiran</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($member as $a)
                                    <tr>
                                        <td>{{ $a->nama }}</td>
                                        <td>{{ $a->company['nama'] }}</td>
                                        <td class="text-center">{{ $a->no_hp }}</td>
                                        <td class="text-center">
                                          @if($a->kehadiran == 'hadir')                                                
                                          <strong class="text-success">HADIR</strong>
                                          @elseif($a->kehadiran == 'tidak_hadir')
                                          <strong class="text-warning">BELUM DIKONFIRMASI</strong>
                                          @endif
                                        </td>
                                        <td class="text-center">
                                            <a type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown">
                                                <span class="caret"></span>
                                            </a>
                                            <div class="dropdown-menu">
                                              @role('superadministrator')
                                              <a href="{{ route('member.edit', $a->uuid) }}" class="dropdown-item">Edit</a>
                                              @endrole
                                              <a href="{{ route('member.show', $a->uuid) }}" class="dropdown-item">Konfirmasi</a>
                                            </div>
                                            {{-- <a class="btn btn-sm btn-warning" href="{{ route('visitor.edit', $a->id) }}"> edit</a> --}}
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
