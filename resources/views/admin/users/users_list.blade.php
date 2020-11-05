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
                                                  <form method="post" action="{{ route('users.store') }}" data-parsley-validate class="form-horizontal form-label-left">
                                                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                                                          <label for="name" class="col-sm-2 col-form-label">Name</label>
                                                          <div class="col-sm-10">
                                                              <input type="text" value="{{ Request::old('name') ?: '' }}" id="name" name="name" class="form-control col-md-11 col-xs-12"> @if ($errors->has('name'))
                                                              <span class="help-block">{{ $errors->first('name') }}</span>
                                                              @endif
                                                          </div>
                                                      </div>

                                                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                                                          <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                          <div class="col-sm-10">
                                                              <input type="text" value="{{ Request::old('email') ?: '' }}" id="email" name="email" class="form-control col-md-11 col-xs-12"> @if ($errors->has('email'))
                                                              <span class="help-block">{{ $errors->first('email') }}</span>
                                                              @endif
                                                          </div>
                                                      </div>

                                                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
                                                          <label for="password" class="col-sm-2 col-form-label">Password</label>
                                                          <div class="col-sm-10">
                                                              <input type="password" value="{{ Request::old('password') ?: '' }}" id="password" name="password" class="form-control col-md-11 col-xs-12"> @if ($errors->has('password'))
                                                              <span class="help-block">{{ $errors->first('password') }}</span>
                                                              @endif
                                                          </div>
                                                      </div>

                                                      <div class="form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }} row">
                                                          <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
                                                          <div class="col-sm-10">
                                                              <input type="password" value="{{ Request::old('confirm_password') ?: '' }}" id="confirm_password" name="confirm_password"
                                                                  class="form-control col-md-11 col-xs-12"> @if ($errors->has('confirm_password'))
                                                              <span class="help-block">{{ $errors->first('confirm_password') }}</span>
                                                              @endif
                                                          </div>
                                                      </div>

                                                      <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }} row">
                                                          <label class="col-sm-2 col-form-label" for="category_id">Role
                                                              <span class="required">*</span>
                                                          </label>
                                                          <div class="col-sm-10">
                                                              <select class="form-control col-md-11" id="role_id" name="role_id">
                                                                  @if(count($roles)) @foreach($roles as $row)
                                                                  <option value="{{$row->id}}">{{$row->name}}</option>
                                                                  @endforeach @endif
                                                              </select>
                                                              @if ($errors->has('role_id'))
                                                              <span class="help-block">{{ $errors->first('role_id') }}</span>
                                                              @endif
                                                          </div>
                                                      </div>

                                                      <div class="ln_solid"></div>

                                                      <div class="form-group">
                                                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                              <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                              <button type="submit" class="btn btn-success">Create User</button>
                                                          </div>
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
                                         <thead>
                                            <tr>
                                              <th>Username</th>
                                              <th>Email</th>
                                              <th>Role</th>
                                              @role('superadministrator')
                                              <th>Action</th>
                                              @endrole
                                            </tr>
                                          </thead>
                                          <tbody>
                                              @foreach($users as $user)
                                                  <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                    @foreach($user->roles as $r)
                                                        {{$r->display_name}}
                                                    @endforeach
                                                    </td>
                                                     @role('superadministrator')
                                                    <td class="text-center">
                                                        <a type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                        </a>
                                                        <div class="dropdown-menu">
                                                         
                                                          <a href="{{ route('users.edit', $user->id) }}" class="dropdown-item">Edit</a>
                                                          @endrole
                                                          <a href="{{ route('users.show', $user->id) }}" class="dropdown-item">Delete</a>
                                                        </div>
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
