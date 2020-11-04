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
                <form action="{{route('visitor.update', $visitor->uuid)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                   <div class="row justify-content-center">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ubah Data Baru</h4>
                                <h6 class="card-subtitle"> Pengunjung Munas APJATI 2020</h6>
                                <img src="/assets/images/icon/staff.png" class="img-circle"  style="display: block;
    margin-left: auto;
    margin-right: auto;" width="100">
                                <div class="form-group">
                                    <br>
                                    <input type="text" class="form-control" id="input-1" name="nama" required value="{{$visitor->nama}}">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="input-1" name="nik" required value="{{$visitor->nik}}">
                                </div>
                                <div class="form-group">                     
                                    <input type="phone" class="form-control" id="input-2" name="phone" required value="{{$visitor->phone}}">
                                </div>
                                <div class="form-group">
                                    <div class="form-footer">
                                        <button type="cancel" class="btn btn-block btn-outline-danger icheck-material-primary">CANCEL</button>
                                        <button type="submit" class="btn btn-block btn-outline-success icheck-material-primary">SAVE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                
            </div>
@endsection