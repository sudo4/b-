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
                    <div class="col-lg-12">
                        <div class="card justify-content-center"> 
                            <div class="card-body text-center">
                                	<img src="/{{asset($member->photo)}}" class="img-circle" width="100">
                                    <h4 class="card-title"></h4>
                                    <h4 class="card-title">{{$member->nama}}</h4>
                                    <h6 class="card-subtitle">{{$member->company['nama']}}</h6>
									<h6 class="card-subtitle">{{$member->no_hp}}</h6>
									<div class="button-group">
										
										@if($member->absensi == NULL)
											<button class="btn btn-block btn-outline-primary" href="/home" onclick="event.preventDefault();document.getElementById('masuk').submit();">MASUK</button> 
											<form id="masuk" action="{{route('absensi.update', $member->uuid)}}" method="POST" class="d-none"> 
												@csrf
												@method('patch') 
												<input id="success1" type="radio" name="absensi" value="Masuk" checked="Masuk" style="opacity: 0%">
											</form>
					
										@elseif($member->absensi == 'Keluar')
							
											<button class="btn btn-block btn-outline-primary" href="/home" onclick="event.preventDefault();document.getElementById('masuk').submit();">MASUK </button>
											<form id="masuk" action="{{route('absensi.update', $member->uuid)}}" method="POST" class="d-none"> 
												@csrf
												@method('patch') 
												<input id="success1" type="radio" name="absensi" value="Masuk" checked="Masuk" style="opacity: 0%">
											</form>

										@elseif($member->absensi == 'Masuk')
											<button class="btn btn-block btn-outline-primary" href="/home" onclick="event.preventDefault();document.getElementById('keluar').submit();">KELUAR </button> 
											<form id="keluar" action="{{route('absensi.update', $member->uuid)}}" method="POST" class="d-none"> 
												@csrf
												@method('patch') 
												<input id="success1" type="radio" name="absensi" value="Keluar" checked="Keluar" style="opacity: 0%">
											</form>

											<button class="btn btn-block btn-outline-info icheck-material-primary" data-toggle="modal" data-target="#komisi">KOMISI</button>
											 <div class="modal fade" id="komisi">
				                              	<div class="modal-dialog modal-sm bg-secondary">
					                                <div class="modal-content text-center" style="background: #1d222b;">
					                                  <div class="modal-header">
					                                    <div class="modal-body">
					                                    <h3 class="text-white">Pilih Komisi</h3>
					                                    <hr>
						                                    <div class="button-group">
						                                    	<button class="btn btn-block btn-success" href="/home" onclick="event.preventDefault();document.getElementById('komisi1').submit();">Komisi 1</button> 
																<form id="komisi1" action="{{route('absensi.update', $member->uuid)}}" method="POST" class="d-none"> 
																	@csrf
																	@method('patch') 
																	<input id="success1" type="radio" name="komisi" value="1" checked="1" style="opacity: 0%">
																</form>
																<button class="btn btn-block btn-info" href="/home" onclick="event.preventDefault();document.getElementById('komisi2').submit();">Komisi 2</button> 
																<form id="komisi2" action="{{route('absensi.update', $member->uuid)}}" method="POST" class="d-none"> 
																	@csrf
																	@method('patch') 
																	<input id="success1" type="radio" name="komisi" value="2" checked="2" style="opacity: 0%">
																</form>
															
																<button class="btn btn-block btn-primary" href="/home" onclick="event.preventDefault();document.getElementById('komisi3').submit();">Komisi 3</button> 
																<form id="komisi3" action="{{route('absensi.update', $member->uuid)}}" method="POST" class="d-none"> 
																	@csrf
																	@method('patch') 
																	<input id="success1" type="radio" name="komisi" value="3" checked="3" style="opacity: 0%">
																</form>		
						                                    </div>
																					                                
														</div>
					                                  </div>
					                                </div>
				                              	</div>
				                            </div>
				                            @endif

										

							


											@role('superadministrator')
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
					                    	@endrole 


									</div>
									
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
                

@endsection
