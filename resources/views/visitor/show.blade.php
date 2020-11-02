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
                                <li></li>
                                <li></li>
                            </ol>
                            
                        </div>
                    </div>
                </div>
                 <div class="row justify-content-center">
                    <!-- Column -->
                    <div class="col-lg-4">
                        <div class="card"> <img class="card-img"  height="456" alt="Card image">
                            <div class="card-img-overlay card-inverse text-white social-profile d-flex justify-content-center">
                                <div class="align-self-center"> <img src="../assets/images/users/1.jpg" class="img-circle" width="100">
                                    <h4 class="card-title"></h4>
                                    <h4 class="card-title">{{$visitor->nama}}</h4>
                                    <h6 class="card-subtitle">{{$visitor->nik}}</h6>
                                    <h6 class="card-subtitle">{{$visitor->uuid}}</h6>
                                    <div class="text-white">
                                    	<form id="personal-info" action="{{route('visitor.update', $visitor->uuid)}}" method="post">
			                                @csrf
			                                @method('patch')
			                                <button type="submit" href="/visitor" class="btn btn-block btn-outline-warning icheck-material-primary"> 
			                                    <input id="success1" type="radio" name="konfirmasi" value="tidak_hadir" checked="tidak_hadir" style="opacity: 0%">
			                                    CANCEL
			                                    <input id="success1" type="radio" name="konfirmasi" style="opacity: 0%"> 
			                                </button>
			                            </form>
			                            <br>
			                            <form id="personal-info" action="{{route('visitor.update', $visitor->uuid)}}" method="post">
			                                @csrf
			                                @method('patch')
			                                <button type="submit" href="/visitor" class="btn btn-block btn-outline-primary icheck-material-warning"> 
			                                    <input id="success1" type="radio" name="konfirmasi" value="hadir" checked="hadir" style="opacity: 0%">
			                                    CONFIRM
			                                    <input id="success1" type="radio" name="konfirmasi" style="opacity: 0%"> 
			                                </button>
			                            </form>
			                            <br>
			                            @role('superadministrator')
					                    
					         
					                          <button class="btn btn-block btn-outline-info icheck-material-primary" data-toggle="modal" data-target="#smallsizemodal">QRCODE</button>
					                          <!-- Modal -->
					                            <div class="modal fade" id="smallsizemodal">
					                              <div class="modal-dialog modal-sm">
					                                <div class="modal-content text-center" style="background: white;">
					                                  <div class="modal-header">
					                                    <div class="modal-body">
					                                    <h3 class="text-secondary">{{$visitor->nama}}</h3>
					                                    <hr>
					                                      {!! QrCode::size(220)->generate(Request::url()); !!}
					                                    </div>
					                                  </div>
					                                </div>
					                              </div>
					                            </div>
					                 
					                    @endrole 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
                

@endsection
