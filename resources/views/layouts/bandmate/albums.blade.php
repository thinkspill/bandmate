@extends('layouts.app')

@section('content')

    @if($request->session()->has('success'))
        <div class="alert alert-success">
            {{ $request->session()->get('success') }}
        </div>
    @endif

    @if($request->session()->has('error'))
        <div class="alert alert-danger">
            {{ $request->session()->get('error') }}
        </div>
    @endif

    <table class="table-responsive">
        <table class="table">
            <tr class="sortlinks">
                <td nowrap class="sort_id">@sortablelink('id', 'Id')</td>
                <td nowrap class="sort_name">@sortablelink('name')</td>
                <td nowrap class="sort_recorded_date">@sortablelink('recorded_date', 'Recorded Date')</td>
                <td nowrap class="sort_release_date">@sortablelink('release_date', 'Release Date')</td>
                <td nowrap class="sort_number_of_tracks">@sortablelink('number_of_tracks', '# Tracks')</td>
                <td nowrap class="sort_label">@sortablelink('label')</td>
                <td nowrap class="sort_producer">@sortablelink('producer')</td>
                <td nowrap class="sort_genre">@sortablelink('genre')</td>
                <td nowrap class="sort_band_name">@sortablelink('band.name', 'Band Name')</td>
            </tr>

            @foreach ($albums as $album)
                <tr id="album_id_{{$album->id}}">
                    <td>{{ $album->id }}</td>
                    <td>{{ $album->name }}</td>
                    <td>{{ $album->recorded_date }}</td>
                    <td>{{ $album->release_date }}</td>
                    <td>{{ $album->number_of_tracks }}</td>
                    <td>{{ $album->label }}</td>
                    <td>{{ $album->producer }}</td>
                    <td>{{ $album->genre }}</td>
                    <td><a href="/bands/{{ str_slug($album->band->name) }}">{{ $album->band->name }}</a></td>
                    <td><a href="/albums/{{$album->id}}/edit" class="btn btn-primary btn-xs" id="edit_album_{{$album->id}}">Edit</a></td>
                    <td>
                        {!! Form::model($album, ['route' => ['albums.destroy', $album->id], 'method' => 'DELETE']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    </table>
    {!! $albums->appends(\Request::except('page'))->render() !!}
@endsection
