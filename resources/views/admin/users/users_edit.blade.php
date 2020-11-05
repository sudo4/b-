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
                <form method="post" action="{{ route('users.update', $user->id) }}" data-parsley-validate >
                    @csrf
                   <div class="row justify-content-center">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit User </h4>
                                <h6 class="card-subtitle"> Panitia Munas APJATI 2020</h6>
                                <br>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-md-10">
                                        <input type="text" value="{{$user->name}}" id="name" name="name" class="form-control col-md-11 col-xs-12"> @if ($errors->has('name'))
                                        <span class="help-block">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-md-10">
                                        <input type="text" value="{{$user->email}}" id="email" name="email" class="form-control col-md-11 col-xs-12"> @if ($errors->has('email'))
                                        <span class="help-block">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }} row">
                                    <label class="col-md-2 col-form-label" for="category_id">Role
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-10">
                                        <select class="form-control col-md-11" id="role_id" name="role_id">
                                            @if(count($roles))
                                            @foreach($roles as $row)
                                            <option value="{{$row->id}}" {{$row->id == $user->roles[0]->id ? 'selected="selected"' : ''}}>{{$row->name}}</option>
                                            @endforeach
                                            @endif
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
                                        <input name="_method" type="hidden" value="PUT">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <button type="cancel" class="btn btn-danger">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                
            </div>
@endsection