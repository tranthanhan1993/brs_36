<div class="form-group">
    {!! Form::label('category_id', trans('book.book_category'), ['class' => 'col-lg-2 control-label'] ) !!}
    <div class="col-lg-8">
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('author_id', trans('book.author'), ['class' => 'col-lg-2 control-label'] ) !!}
    <div class="col-lg-8">
        {!! Form::select('author_id', $authors, null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('tittle', trans('book.title'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-8">
        {!! Form::text('tittle', null, ['class' => 'form-control', 'rows' => 3]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('num_pages', trans('book.num_pages'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-3">
        {!! Form::text('num_pages', null, ['class' => 'form-control', 'rows' => 3]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('public_date', trans('book.public_day'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-3">
        {!! Form::date('public_date', \Carbon\Carbon::now(),['class' => 'form-control', 'rows' => 3, 'col-lg-4'] ) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('content', trans('book.content'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-8">
        {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => 5]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('image', trans('book.image'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-8">
        {!! Form::file('image') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-lg-8 col-lg-offset-2">
        {!! Form::submit(trans('book.submit'), ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
    </div>
</div>
