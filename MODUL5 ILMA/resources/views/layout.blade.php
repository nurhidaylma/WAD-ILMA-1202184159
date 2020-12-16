<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
    <div class="container-fluid">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ url('/home') }}">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('product.index') }}">PRODUCT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('order.index') }}">ORDER</a>
            </li>  
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('history.index') }}" tabindex="-1">HISTORY</a>
            </li>
        </ul>

        @yield('content')
        <div class="container text-center pt-5">
            
        </div>
    </div>
</body>
</html>