@extends('layouts.masterlogreg')

@section('title', 'Ez Travel - Edit Profile')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Edit Your Profile</div>
                    <div class="panel-body">
                        @if(session('ok'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                                {{session('ok')}}
                            </div>
                        @endif
                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ url('ez/member/'.$user->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('put') }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                                <label for="name" class="col-md-4 control-label">First Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ $user->name or old('name') }}" required autofocus>
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }} has-feedback">
                                <label for="name" class="col-md-4 control-label">Last Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="lastname"
                                           value="{{ $user->lastname or old('lastname') }}" required autofocus>
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    @if ($errors->has('lastname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ $user->email or old('email') }}" required>
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ session('password') ? ' has-error' : '' }} has-feedback">
                                <label for="password" class="col-md-4 control-label">Old Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                                    @if (session('status'))
                                        <span class="help-block">
                                            <strong>{{ session('status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }} has-feedback">
                                <label for="password" class="col-md-4 control-label">New Password</label>

                                <div class="col-md-6">
                                    <input placeholder="atau isikan dengan password lama anda" id="password"
                                           type="password" class="form-control" name="new_password">
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                                    @if ($errors->has('new_password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} has-feedback">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm New
                                    Password</label>
                                <div class="col-md-6">
                                    <input placeholder="atau isikan dengan password lama anda" id="password-confirm"
                                           type="password" class="form-control"
                                           name="password_confirmation">
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
