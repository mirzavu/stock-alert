<div class="form-group {{ $errors->has('stock') ? 'has-error' : ''}}">
    {!! Form::label('stock', 'Stock', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('stock', null, ['class' => 'form-control']) !!}
        {!! $errors->first('stock', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('buyprice') ? 'has-error' : ''}}">
    {!! Form::label('buyprice', 'Buyprice', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('buyprice', null, ['class' => 'form-control']) !!}
        {!! $errors->first('buyprice', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('todaysprice') ? 'has-error' : ''}}">
    {!! Form::label('todaysprice', 'Todaysprice', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('todaysprice', null, ['class' => 'form-control']) !!}
        {!! $errors->first('todaysprice', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('currentprice') ? 'has-error' : ''}}">
    {!! Form::label('currentprice', 'Currentprice', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('currentprice', null, ['class' => 'form-control']) !!}
        {!! $errors->first('currentprice', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>