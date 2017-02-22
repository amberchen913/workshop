<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">
</head>

<body>
    <div class="container">
        <!--@include('partials.flash')-->
        @include('flash::message')
    
        @yield('content')
    </div>
    
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script>
        $('#flash-overlay-modal').modal();
//        $('div.alert').not('.alert-important').delay(3000).slideUp(300);
    </script>

    @yield('footer')
</body>

</html>