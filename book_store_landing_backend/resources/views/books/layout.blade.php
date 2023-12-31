<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<div class="container mb-2 bg-light text-dark">
    @yield('content')
</div>

<div class="container mb-2 bg-light text-dark">
    @yield('reviews')
</div>

<div class="container mb-2 bg-light text-dark">
    @yield('form')
</div>

</body>
</html>
