@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">

                    {!! Form::open(['class' => 'form-horizontal']) !!}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', trans('auth.name'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', '', ['class' => 'form-control']) !!}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('name', trans('auth.email'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::email('email', '', ['class' => 'form-control']) !!}

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('password', trans('auth.password'), ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::password('password', ['class' => 'form-control']) !!}

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('password-confirm', trans('auth.confirm_password'), ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                            {!! Form::password('password-confirm', ['class' => 'form-control', 'name' => 'password_confirmation']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('gender', trans('auth.gender'), ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::select('gender', ['0' => 'Male', '1' => 'Female'], 'Male',['class' => 'form-control']) !!}

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('birthday', trans('auth.birthday'), ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::date('birthday', \Carbon\Carbon::now(), ['class' => 'form-control']); !!}

                                @if ($errors->has('birthday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('phone', trans('auth.phone'), ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::text('phone', '', ['class' => 'form-control']) !!}

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('address', trans('auth.address'), ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::text('address', '', ['class' => 'form-control']) !!}

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit(trans('auth.register'), ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
