@extends('layouts.app')

@section('content')
    <div class="col-sm-7 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Biography</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="http://lorempixel.com/200/200/cats/" alt="" class="pull-right totallyAccurateBandPhoto" style="max-width: 100%; margin-bottom: 1em;">
                    </div>
                    <div class="col-sm-8">
                        <h2 style="margin-top: 0;">{{$band->name}}</h2>
                        <p class="lead">
                            {{$band->name}} started rocking
                            @if ($yearsRocking === 0)
                                this year
                            @else
                                {{$yearsRocking}} year{{$yearsRocking > 1 ? 's' : ''}} ago
                            @endif
                            and has produced {{$albumCount}} album{{$albumCount === 1 ? '' : 's'}}.
                        </p>
                        @if($band->still_active === 'yes')
                            <h4>Now Touring!</h4>
                        @endif
                        <p>
                            <a href="http://example.com">{{$band->website}}</a>
                        </p>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12"></div>
                </div>
            </div>
            <div class="panel-footer">
                <small>Woo!</small>
            </div>
        </div>
        <div class="panel panel-default absolutelyRealDiscographyNoFakingHere">
            <div class="panel-heading">
                <h3 class="panel-title">Discography for {{$band->name}}</h3>
            </div>
            <div class="panel-body">
                @if (!count($band->albums()->get()))
                    <p>This band has not released any albums!</p>
                @endif
                @foreach ($band->albums()->orderBy('release_date')->get() as $album)
                    <div class="row" style="margin-bottom: 1em;">
                        <div class="col-sm-4">
                            <h2>
                                {{date('Y', strtotime($album->release_date))}}
                            </h2>
                            <h4>
                                {{$album->genre}}
                            </h4>
                            <p style="font-size: .7em;">
                                Tracks: <b>{{$album->number_of_tracks}}</b><br> Label: <b>{{$album->label}}</b><br>
                                Producer: <b>{{$album->producer}}</b><br>
                            </p>
                        </div>
                        <div class="col-sm-8 clearfix text-center" style="width: 28vw; height: 28vw;background-image: url({!! $randomAlbumCover() !!});  background-size: cover; overflow: hidden;">
                            <h3 style='font-family: {!! $randomAlbumText() !!}; color: white;text-shadow: 1px 1px 1px #000;margin-top: {{random_int(0,50)}}%;' class="slabtext">{{$album->name}}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="panel-footer">
                Rock on!
            </div>
        </div>
    </div>

@endsection
