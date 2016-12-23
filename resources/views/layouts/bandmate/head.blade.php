<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title}} &middot; @if($request->has('page')) Page {{ $request->page }} &middot; @endif Oi! B&M8!</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/bootcards/1.1.1/css/bootcards-desktop.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="/css/app.css" rel="stylesheet">


    <script>
        window.Laravel = {!!  json_encode(['csrfToken' => csrf_token(),]) !!}
    </script>


    </style>
</head>
