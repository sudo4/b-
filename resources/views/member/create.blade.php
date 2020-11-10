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
                <form action="{{route('member.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                   <div class="row justify-content-center">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tambah Data Baru</h4>
                                <h6 class="card-subtitle"> Peserta Munas APJATI 2020</h6>
                                <div class="form-group">
                                  <input type="text" class="form-control" id="input-1" placeholder="Masukkan Nama" required name="nama" autocomplete="off" value="{{old('nama')}}">
                                </div>
                                <div class="form-group">
                                    <select class="select2 form-control custom-select" name="company_id" style="width: 100%; height:36px;">
                                        <option label="Pacific Time Zone">
                                            @foreach ($company as $company)
                                                <option required value="{{ $company->id }}">{{ $company->nama }}</option>  
                                            @endforeach
                                        </option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <input type="number" class="form-control" id="input-1" autocomplete="off" placeholder="Masukkan Nomor Ponsel" required name="no_hp" value="{{old('no_hp')}}">
                                    <input id="primary1" type="radio" name="kehadiran" value="tidak_hadir" checked="tidak_hadir" class="d-none">
                                </div>
                                <div class="form-group"> 
                                    <input type="file" id="input-file-now" class="dropify" name="photo" />
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                      <button type="submit" class="btn btn-primary icheck-material-primary"> 
                                        
                                        Simpan
                                      </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                
            </div>
@endsection