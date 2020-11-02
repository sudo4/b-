@extends('layouts.app')

@section('content')
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">P3MI Profile</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">P3MI Profile</li>
                            </ol>

                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <br>
                            <br>
                    <div class="col-lg-6 ">
                        <div class="card"> 
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="card-img-overlay card-inverse text-white social-profile d-flex justify-content-center">
                                <div class="align-self-center">
                                    <h4 class="card-title">{{$company->nama}}</h4>
                                    <h6 class="card-subtitle">{{$company->sippmi}}</h6>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body"> <small class="text-muted">Email </small>
                                <h6>{{$company->surel}}</h6> <small class="text-muted p-t-30 db">Telp</small>
                                <h6>{{$company->telp_kantor}}</h6> <small class="text-muted p-t-30 db">Fax</small> <h6>{{$company->telp_kantor2}}</h6><small class="text-muted p-t-30 db">Alamat</small> <h6>{{$company->alamat}}</h6>
                                <div class="map-box">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div> <small class="text-muted p-t-30 db">Social Profile</small>
                                <br/>
                                <button class="btn btn-circle btn-secondary"><i class="fa fa-facebook"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fa fa-twitter"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fa fa-youtube"></i></button>
                                <button class="btn btn-circle btn-secondary"><i class="fa fa-pencil"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection