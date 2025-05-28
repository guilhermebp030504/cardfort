<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Cardfort')</title>
    
    <link rel="icon" href="{{ asset('img/icone.png') }}">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/principal.css') }}">
    
    @stack('styles')
    
    <style>
        button, button:focus, button:active {
            border: 1px solid black;
            background: none;
            outline: none;
            padding: 0;
            border: none;
            font-family: system-ui, -apple-system, Helvetica, Arial, Sans-serif;
        }
        
        button span {
            position: relative;
        }
        
        p {
            color: black;
        }
        
        .modal-content {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            width: 100%;
            pointer-events: auto;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0,0,0,.4);
            border-radius: .9rem;
            outline: 0;
            filter: drop-shadow(0 0 0.75rem #feffde);
        }
        
        .btn-primary {
            color: #fff;
            background-color: #ffa600;
            border-color: #ffa600;
        }
        
        .btn-primary:hover {
            color: #fff;
            background-color: #ff9900;
            border-color: #ff8c00;
        }
        
        .btn-primary.focus, .btn-primary:focus {
            box-shadow: 0 0 0 .2rem rgba(255, 153, 0,.5);
        }
    </style>
</head>
<body style="background-color:rgb(139, 139, 139);" id="principal">
    
    @include('layouts.header')
    
    @yield('modals')
    
    <main id="principal">
        @yield('content')
    </main>
    <br><br><br><br><br><br><br>
    @include('layouts.footer')
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    @stack('scripts')
</body>
</html>