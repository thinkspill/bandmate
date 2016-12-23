@extends('layouts.app')

@section('content')

    @if($album->name)
        <h2>Editing <b>{{$album->name}}</b> by <em>{{$album->band->name}}</em></h2>
    @else
        <h2>Adding New Album</h2>
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
    @if ($album->id)
        {!! Form::model($album, ['route' => ['albums.update', $album->id], 'method' => 'put']) !!}
    @else
        {!! Form::model($album, ['route' => ['albums.store'], 'method' => 'post']) !!}
    @endif

    <div class="form-group">
        {!! Form::label('name', 'Album Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('name', 'Band Name') !!}
        {!! Form::select('band_id', \App\Band::orderBy('name')->distinct()->pluck('name', 'id'), null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('recorded_date', 'Recorded Date') !!}
        {!! Form::date('recorded_date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('release_date', 'Release Date') !!}
        {!! Form::date('release_date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('number_of_tracks', '# Tracks') !!}
        {!! Form::text('number_of_tracks', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('label', 'Label') !!}
        {!! Form::text('label', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('producer', 'Producer') !!}
        {!! Form::text('producer', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('name', 'Genre') !!}
        {!! Form::select('genre', \App\Album::orderBy('genre')->distinct()->pluck('genre', 'genre'), $album->genre, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
