<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @section('title')Hot News ::@show
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    @section('style_link')
        <link href="css/app.css" rel="stylesheet">@show
</head>
<body>
@include('nav.siteMenu')
@include('header.siteHeader')

<hr>
<div class="container">
    @yield('page_content')
</div>

@include('footer')
</body>
</html>
