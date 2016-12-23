<!-- fixed top navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
                <span class="icon-bar"></span> <span class="icon-bar"></span>
            </button>
        </div>
        <button type="button" class="btn btn-default btn-back navbar-left pull-left hidden" onclick="history.back()">
            <i class="fa fa-lg fa-chevron-left"></i> <span>Back</span>
        </button>
        <!-- menu button to show/ hide the off canvas menu -->
        <button type="button" class="btn btn-default btn-menu navbar-left pull-left" data-toggle="offcanvas">
            <i class="fa fa-lg fa-bars"></i><span>Menu</span>
        </button>

        <a class="navbar-brand" title="B&M8" href="/" style="padding: 5px 15px;">{!! $brandEasterEgg !!}<br>M8</a>

        <!--navbar menu options: shown on desktop only -->
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="{{ !$request->is('albums*') ? 'active' : '' }} dropdown">
                    <a href="/" class="dropdown-toggle">
                        <i class="fa fa-birthday-cake"></i> Bands <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/bands/create">New</a></li>
                    </ul>
                </li>
                <li class="{{ $request->is('albums*') ? 'active' : '' }} dropdown">
                    <a href="/albums" class="dropdown-toggle">
                        <i class="fa fa-bullseye"></i> Albums <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/albums/create">New</a></li>
                    </ul>
                </li>
                @if ($request->is('albums*') && !$request->is('albums/create*'))
                    <li>
                        <div class="row">
                            <div class="col-sm-8">
                                <div style="padding: 15px;">
                                    {!! Form::model(\App\Band::class, ['route' => 'albums.index', 'method'=>'GET', 'id'=>'bandselectform']) !!}
                                    @if ($request->has('sort'))
                                        {!! Form::hidden('sort', $request->sort) !!}
                                    @endif
                                    @if ($request->has('order'))
                                        {!! Form::hidden('order', $request->order) !!}
                                    @endif
                                    {!! Form::select('band', \App\Band::orderBy('name')->pluck('name', 'id'), null, ['class' => 'form-control bandselect', 'placeholder'=>'Filter by band', 'id' => 'bandselect']) !!}
                                    <noscript>
                                        {!! Form::submit('Filter', ['class'=>'btn btn-default btn-xs']) !!}
                                    </noscript>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div style="padding: 15px;">
                                    @if ($request->has('band'))
                                        <a href="/albums" class="btn btn-default btn-xs">
                                            <i class="fa fa-minus-circle" aria-hidden="true"></i> Clear Filter</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
                @endif

                <li>
                    <p style="padding: 15px;"></p>
                </li>
            </ul>
        </div>
    </div>
</div>