<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login - Laravel</title>

	<link rel="stylesheet" type="text/css" href="{{ asset('css/estilo.css') }}">
	 <link rel="icon" href="{{ asset('img/icone.png') }}"> 

	<style type="text/css">
   body{
   	background-image: url({{ asset('img/samambaia.jpg') }})
   }
	</style>
</head>
<body>

<div>
	<center>
		
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('error'))
    <div style="color: red;">
        {{ session('error') }}
    </div>
@endif

<form name="form_login" id="form_login" method="post" action="{{ route('login.post') }}">
    @csrf

<h1>Realize o seu login</h1>

<input type="text" autocomplete="off" name="usuario" id="usuario" placeholder="Usuario" maxlength="20" value="{{ old('usuario') }}" required>
<input type="password" autocomplete="off" name="senha" id="senha" placeholder="Senha" maxlength="20" required>
<br>

<input type="submit" name="entrar" id="entrar" value="Entrar" class="botao">
<br>

</form>
	</center>
</div>

</body>
</html>
