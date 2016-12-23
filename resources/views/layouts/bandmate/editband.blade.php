@extends('layouts.app')

@section('content')

    @if($band->name)
        <h2>Editing {{$band->name}}</h2>
    @else
        <h2>Adding New Band</h2>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($band->id)
        {!! Form::model($band, ['route' => ['bands.update', $band->id], 'method' => 'put']) !!}
    @else
        {!! Form::model($band, ['route' => ['bands.store'], 'method' => 'post']) !!}
    @endif
    <div class="form-group">
        {!! Form::label('name', 'Band Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('start_date', 'Start Date') !!}
        {!! Form::date('start_date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('website', 'Website') !!}
        {!! Form::text('website', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('still_active', 'Still Active') !!}
        {!! Form::select('still_active', \App\Band::orderBy('still_active')->distinct()->pluck('still_active', 'still_active'), $band->still_active, ['class' => 'form-control']) !!}

    </div>
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
