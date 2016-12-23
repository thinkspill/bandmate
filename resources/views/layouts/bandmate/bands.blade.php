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
            <tr>
                <td nowrap>@sortablelink('id', 'Id')</td>
                <td nowrap>@sortablelink('name')</td>
                <td nowrap>@sortablelink('start_date', 'Start Date')</td>
                <td nowrap>@sortablelink('website')</td>
                <td nowrap>@sortablelink('still_active', 'Still Active')</td>
                <td nowrap>Edit</td>
                <td nowrap>Delete</td>
            </tr>
            @foreach ($bands as $band)
                <tr id="band_id_{{$band->id}}">
                    <td>{{$band->id}}</td>
                    <td><a href="/bands/{{str_slug($band->name)}}">{{$band->name}}</a></td>
                    <td>{{$band->start_date}}</td>
                    <td>{{$band->website}}</td>
                    <td>{{$band->still_active}}</td>
                    <td><a href="/bands/{{$band->id}}/edit" class="btn btn-primary btn-xs" id="edit_band_{{$band->id}}">Edit</a></td>
                    <td>
                        <form action="/bands/{{$band->id}}" method="post">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <input type="submit" value="Delete" class="btn btn-danger btn-xs">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </table>
    {!! $bands->appends(\Request::except('page'))->render() !!}
@endsection
