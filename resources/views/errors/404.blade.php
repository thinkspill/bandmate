<!DOCTYPE html>
<html>
<head>
    <title>Be right back.</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:400" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #464D50;
            display: table;
            font-family: 'Lato', sans-serif;
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .container a {
            color: #464D50;
        }

    </style>
</head>
<body>
<div class="container">
    <h1>Missing <a href="/">Band</a> or <a href="/albums">Album</a></h1>
    <p>Maybe it was already deleted?</p>
    <p style="font-size: 90%;">({{$exception->getMessage()}})</p>
</div>
</body>
</html>
