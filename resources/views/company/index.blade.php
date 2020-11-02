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
                            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-4">
                        <div class="">
                            <div class="card-body">
                                <!-- sample modal content -->
                                <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-secondary">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('company.store')}}", method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                      <label for="input-1">Nama p3mi</label>
                                                      <input type="text" class="form-control" id="input-1" placeholder="Masukkan Nama" required name="nama" value="{{old('nama')}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="input-1">sippmi</label>
                                                        <input type="text" class="form-control" id="input-1" placeholder="Masukkan SIPPMI" required name="sippmi" value="{{old('sippmi')}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="input-1">Alamat</label>
                                                        <textarea type="text" class="form-control" id="input-1" rows="4" placeholder="Masukkan Alamat" required name="alamat" value="{{old('alamat')}}"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="input-1">Telp Kantor</label>
                                                        <input type="text" class="form-control" id="input-1" placeholder="Masukkan Nomor Telepon Kantor" required name="telp_kantor" value="{{old('telp_kantor')}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="input-1">Fax (opt)</label>
                                                        <input type="text" class="form-control" id="input-1" placeholder="Masukkan Nomor Fax" name="telp_kantor2" value="{{old('telp_kantor2')}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="input-1">Email</label>
                                                        <input type="email" class="form-control" id="input-1" placeholder="Masukkan Email" required name="surel" value="{{old('surel')}}">
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                     <button type="submit" class="btn btn-primary px-5"><i class="icon-check"></i> Simpan</button>
                                                   </div>
                                                </form>
                                            </div>
                                            
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->

                            </div>
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
                                        <thead class="text-center">
                                            <tr>
                                                <th>Nama</th>
                                                <th>SIPPMI</th>
                                                <th>Alamat</th>
                                                <th>Telepon</th>
                                                <th>Fax</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($company as $a)
                                            <tr>
                                                <td><a href="{{route('company.show', $a->uuid)}}">{{$a->nama}}</a> </td>
                                                <td>{{$a->sippmi}}</td>
                                                <td>{{$a->alamat}}</td>
                                                <td>{{$a->telp_kantor}}</td>
                                                <td>{{$a->telp_kantor2}}</td>
                                                <td>{{$a->surel}}</td>
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
