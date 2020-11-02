@extends('layouts.app')

@section('content')
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
               <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor"></h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)"></a></li>
                                <li class="breadcrumb-item active"></li>
                            </ol>
                            
                        </div>
                    </div>
                </div>
                 <div class="row justify-content-center">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card"> <img class="card-img" src="../assets/images/background/socialbg.jpg" height="456" alt="Card image">
                            <div class="card-img-overlay card-inverse text-white social-profile d-flex justify-content-center">
                                <div class="align-self-center"> <img src="../assets/images/users/1.jpg" class="img-circle" width="100">
                                    <h4 class="card-title">James Anderson</h4>
                                    <h6 class="card-subtitle">@jamesandre</h6>
                                    <div class="text-white">
                                    	<form id="personal-info" action="{{route('visitor.update', $visitor->uuid)}}" method="post">
                                @csrf
                                @method('patch')
                                <button type="submit" href="/visitor" class="btn btn-block btn-outline-warning icheck-material-primary"> 
                                    <input id="success1" type="radio" name="konfirmasi" value="tidak_hadir" checked="tidak_hadir">
                                    CANCEL
                                </button>
                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
                

@endsection
