@extends('layout.app')

<style type="text/css">
	@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');

	*{
		font-family: Roboto;
	}

	body{
		margin: 0;
		padding: 0;
		border: 0;
		font-size: 15px;
		display: flex;
		background: linear-gradient(45deg, #8e2de2, #4a00e0);
		justify-content: center;
		align-items: center;
	}
	
	form{
		display: flex;
		flex-direction: column;
		padding: 2rem;
		background: white;
		border-radius: 10px;
		width: 30vh;
		box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
	}

	h2{
		border-left: 5px solid #FCBA03;
		padding: 3px;
	}

	input{
		outline: none;
		height: 4vh;
		width: 100%;
		padding: 5px;
		margin-top: 10px;
		font-size: 15px;
	}

	button{
		margin-top: 10px;
		height: 5vh;
		background: #FCBA03;
		border: 0;
		color: white;
		font-size: 20px;
		border-radius: 3px;
		font-weight: bold;
		cursor: pointer;
	}

	span{
		margin-top: 10px;
		text-align: center;
	}

	span a{
		text-decoration: none;
		font-weight: bold;
		color: black;
	}

	span .error{
		font-weight: bold;
		color: red;
	}

</style>

@section('title-page', 'Login')

@section('content')

		<form action="{{ route('auth.login') }}" method="post">
			<h2>Login</h2>
			@error('error')
				<span class="error">{{ $message }}</span>
			@enderror

			@csrf

			<input type="email" name="email" placeholder="Email" 
			value="{{
				Session::has('email') ? Session::get('email') : ''
			}}">
			@error('email')
				<span class="error">{{ $message }}</span>
			@enderror

			<input type="password" name="password" placeholder="Senha">
			@error('password')
				<span class="error">{{ $message }}</span>
			@enderror

			<button type="submit">Entrar</button>
			<span>Não tem conta?<a href="{{ route('app.createAccount') }}"> Cadastre-se</a></span>
		</form>
@endsection