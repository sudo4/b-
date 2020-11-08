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
                    <div class="col-lg-6">
                        <div class="card"> <img class="card-img"  height="456" alt="Card image">
                            <div class="card-img-overlay card-inverse text-white social-profile d-flex justify-content-center">
                                <div class="align-self-center"> <img src="/{{asset($member->photo)}}" class="img-circle" width="100">
                                    <h4 class="card-title"></h4>
                                    <h4 class="card-title">{{$member->nama}}</h4>
                                    <h6 class="card-subtitle">{{$member->company['nama']}}</h6>
									<h6 class="card-subtitle">{{$member->no_hp}}</h6>
									<div class="table-responsive m-t-40">
										<table  cellspacing="0" width="100%">
											<tbody>
												<tr>
													<td class="text-center">
														<a class="btn btn-block btn-outline-primary" href="/home" onclick="event.preventDefault();document.getElementById('masuk').submit();">MASUK </a> 
														<form id="masuk" action="{{route('absensi.update', $member->uuid)}}" method="POST" class="d-none"> 
															@csrf
															@method('patch') 
															<input id="success1" type="radio" name="absensi" value="Masuk" checked="Masuk" style="opacity: 0%">
														</form>
														<form action="{{route('absensi.store')}}" method="post" class="d-none">
															<input id="success1" type="radio" name="absensi" value="Masuk" checked="Masuk" style="opacity: 0%">
															<input id="success1" type="radio" name="absensi" value="Masuk" checked="Masuk" style="opacity: 0%">
															<input id="success1" type="radio" name="absensi" value="Masuk" checked="Masuk" style="opacity: 0%">

														</form>
													</td>
													<td><a class="btn btn-block btn-outline-primary" href="/home" onclick="event.preventDefault();document.getElementById('keluar').submit();">KELUAR </a> 
														<form id="keluar" action="{{route('absensi.update', $member->uuid)}}" method="POST" class="d-none"> 
															@csrf
															@method('patch') 
															<input id="success1" type="radio" name="absensi" value="Keluar" checked="Keluar" style="opacity: 0%">
														</form>
													</td>
												</tr>
												<tr>
													<td>
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
													</td>
												</tr>
											
											</tbody> 
										</table>
									</div>
									<table class="col-lg-24">
										<td>
											

										</td>
										<td>
											
										</td>
									</table>
									<div class="btn">
										
											

									</div>
                                    {{-- <div class="text-white">
                                    	<form id="personal-info" action="{{route('absensi.update', $member->uuid)}}" method="post">
			                                @csrf
			                                @method('patch')
			                                <button type="submit" href="/home" class="btn btn-block btn-outline-warning icheck-material-primary"> 
			                                    <input id="success1" type="radio" name="absensi" value="Keluar" checked="Keluar" style="opacity: 0%">
			                                    KELUAR
			                                    <input id="success1" type="radio" name="konfirmasi" style="opacity: 0%"> 
			                                </button>
			                            </form>
			                            <br>
			                            <form id="personal-info" action="{{route('absensi.update', $member->uuid)}}" method="post">
			                                @csrf
			                                @method('patch')
			                                <button type="submit" href="/home" class="btn btn-block btn-outline-primary icheck-material-warning"> 
			                                    <input id="success1" type="radio" name="absensi" value="Masuk" checked="Masuk" style="opacity: 0%">
			                                    MASUK
			                                    <input id="success1" type="radio" name="konfirmasi" style="opacity: 0%"> 
			                                </button>
			                            </form>
			                            <br>
			                            
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
                

@endsection
