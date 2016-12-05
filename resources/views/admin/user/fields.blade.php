
<div class="form-group col-sm-6">
    {!! Form::label('name', trans('user.name')) !!}
    
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('email', trans('user.email')) !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('password', trans('user.password')) !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('avatar', trans('user.avatar')) !!}
    {!! Form::file('avatar') !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::submit(trans('label.save'), ['class' => 'btn btn-primary']) !!}
    <a href="#" class="btn btn-default">{{ trans('user.back') }}</a>
</div>
