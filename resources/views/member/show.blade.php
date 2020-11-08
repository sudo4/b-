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
                                <div class="align-self-center"> <img src="{{asset($member->photo)}}" class="img-circle" width="100">
                                    <h4 class="card-title"></h4>
                                    <h4 class="card-title">{{$member->nama}}</h4>
                                    <h6 class="card-subtitle">{{$member->company['nama']}}</h6>
									<h6 class="card-subtitle">{{$member->no_hp}}</h6>
									<div class="btn-group">
										<div class="col-lg-6">
											<a class="btn btn-block btn-outline-primary" href="/home" onclick="event.preventDefault();document.getElementById('hadir').submit();" >{{ __('CONFIRM') }} </a> 
											<form id="hadir" action="{{route('member.update', $member->uuid)}}" method="post" class="d-none"> @csrf @method('patch')
												<input id="hadir" type="" name="kehadiran" value="hadir" checked="hadir" >
											</form>
										</div>
										<div class="col-lg-6">
											<a class="btn btn-block btn-outline-danger" href="/home" onclick="event.preventDefault();document.getElementById('tidak_hadir').submit();" >{{ __('CANCEL') }} </a> 
											<form id="tidak_hadir" action="{{route('member.update', $member->uuid)}}" method="post" class="d-none"> @csrf @method('patch')
												<input id="tidak_hadir" type="" name="kehadiran" value="tidak_hadir" checked="tidak_hadir" >
											</form>
										</div>
									</div>
									<div class="btn-group"> 
										@role('superadministrator')
					                    <div class="col-lg-12">
											<button class="btn btn-block btn-outline-info icheck-material-primary" data-toggle="modal" data-target="#smallsizemodal">QRCODE</button>
					                          <!-- Modal -->
					                            <div class="modal fade" id="smallsizemodal">
					                              <div class="modal-dialog modal-sm">
					                                <div class="modal-content text-center" style="background: white;">
					                                  <div class="modal-header">
					                                    <div class="modal-body">
					                                    <h3 class="text-secondary">{{$member->nama}}</h3>
					                                    <hr>
					                                      {!! QrCode::size(220)->generate(Request::url()); !!}
					                                    </div>
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
