@extends('layouts.admin.master')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel-heading">
            <h2> {{ trans('user.detail') }} </h2>
        </div>
                <div class="panel panel-default">
                <div class="panel-heading"> {{ trans('user.detail_user') }} </div>
                <div class="panel-body">
                    <div class="form-group">
                    {!! Form::label('id', trans('user.id')) !!}
                    <p>1</p>
                    </div>

                    <div class="form-group">
                        {!! Form::label('name', trans('user.name')) !!}
                        <p>Tran An</p>
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', trans('user.email')) !!}
                        <p>tranan@gmail.com</p>
                    </div>

                    <div class="form-group">
                        {!! Form::label('role', trans('user.role')) !!}
                        <p>admin</p>
                    </div>

                    <div class="form-group">
                        {!! Form::label('avatar', trans('user.avatar')) !!}
                        <p><img src=""></p>
                    </div>

                    <div class="form-group">
                        {!! Form::label('created_at', trans('user.created_at')) !!}
                        <p></p>
                    </div>

                    <div class="form-group">
                        {!! Form::label('updated_at', trans('user.updated_at')) !!}
                        <p></p>
                    </div>

                        <a href="#" class="btn btn-default">{{ trans('user.back') }}</a>
                    </div>
            </div>
    </div>    
</div>
@endsection
