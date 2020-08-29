<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<link rel="manifest" href="manifest.json">

	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="application-name" content="Minhas Contas">
	<meta name="apple-mobile-web-app-title" content="Minhas Contas">
	<meta name="msapplication-starturl" content="http://161.97.107.158:8090/">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="icon" type="image/png" sizes="192x192" href="https://image.flaticon.com/icons/svg/3154/3154363.svg">
	<link rel="apple-touch-icon" type="image/png" sizes="192x192" href="https://image.flaticon.com/icons/svg/3154/3154363.svg">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Minhas Contas</title>
	<link href="https://image.flaticon.com/icons/svg/3154/3154363.svg" rel="shortcut icon" type="image/x-icon" />

	<style>
		:root {
			--input-padding-x: 1.5rem;
			--input-padding-y: .75rem;
		}

		.form_cadastro,
		.alert_sucesso,
		.alert_erro,
		.loading-ajax-img {
			display: none;
		}

		body {
			background: #007bff;
			background: linear-gradient(to right, #0062E6, #33AEFF);
		}

		.card-signin {
			border: 0;
			border-radius: 1rem;
			box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
		}

		.card-signin .card-title {
			margin-bottom: 2rem;
			font-weight: 300;
			font-size: 1.5rem;
		}

		.card-signin .card-body {
			padding: 2rem;
		}

		.form-signin {
			width: 100%;
		}

		.form-signin .btn {
			font-size: 80%;
			border-radius: 5rem;
			letter-spacing: .1rem;
			font-weight: bold;
			padding: 1rem;
			transition: all 0.2s;
		}

		.form-label-group {
			position: relative;
			margin-bottom: 1rem;
		}

		.form-label-group input {
			height: auto;
			border-radius: 2rem;
		}

		.form-label-group>input,
		.form-label-group>label {
			padding: var(--input-padding-y) var(--input-padding-x);
		}

		.form-label-group>label {
			position: absolute;
			top: 0;
			left: 0;
			display: block;
			width: 100%;
			margin-bottom: 0;
			/* Override default `<label>` margin */
			line-height: 1.5;
			color: #495057;
			border: 1px solid transparent;
			border-radius: .25rem;
			transition: all .1s ease-in-out;
		}

		.form-label-group input::-webkit-input-placeholder {
			color: transparent;
		}

		.form-label-group input:-ms-input-placeholder {
			color: transparent;
		}

		.form-label-group input::-ms-input-placeholder {
			color: transparent;
		}

		.form-label-group input::-moz-placeholder {
			color: transparent;
		}

		.form-label-group input::placeholder {
			color: transparent;
		}

		.form-label-group input:not(:placeholder-shown) {
			padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
			padding-bottom: calc(var(--input-padding-y) / 3);
		}

		.form-label-group input:not(:placeholder-shown)~label {
			padding-top: calc(var(--input-padding-y) / 3);
			padding-bottom: calc(var(--input-padding-y) / 3);
			font-size: 12px;
			color: #777;
		}

		.btn-google {
			color: white;
			background-color: #19bf05;
		}

		.btn-facebook {
			color: white;
			background-color: #3b5998;
		}

		/* Fallback for Edge
  -------------------------------------------------- */

		@supports (-ms-ime-align: auto) {
			.form-label-group>label {
				display: none;
			}

			.form-label-group input::-ms-input-placeholder {
				color: #777;
			}
		}

		/* Fallback for IE
  -------------------------------------------------- */

		@media all and (-ms-high-contrast: none),
		(-ms-high-contrast: active) {
			.form-label-group>label {
				display: none;
			}

			.form-label-group input:-ms-input-placeholder {
				color: #777;
			}
		}
	</style>
</head>
<script>
	base_url = "<?php echo base_url(); ?>";
</script>
<?php if ($this->session->userdata('nome')) {
	header('Location: inicio');
} ?>

<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
				<div class="card card-signin my-5">
					<div class="card-body">
						<h5 class="card-title text-center">Acessar</h5>
						<div class="alert alert-success alert_sucesso" role="alert">
							<span id="alert_sucesso_p"></span>
						</div>
						<div class="alert alert-danger alert_erro" role="alert">
							<span id="alert_erro_p"></span>
						</div>
						<form class="form-signin form_login">
							<div class="form-label-group">
								<input type="text" id="log_usuario" class="form-control" placeholder="Login" required autofocus>
								<label for="log_usuario">Login</label>
							</div>
							<div class="form-label-group">
								<input type="password" id="log_senha" class="form-control" placeholder="Senha" required>
								<label for="log_senha">Senha</label>
							</div>
							<img id="ajax-img-login" class="loading-ajax-img" src="<?= base_url() ?>img/ajax-loader.gif" alt="">
							<button class="btn btn-lg btn-primary btn-block text-uppercase btn_logar">Entrar</button>
							<button class="btn btn-lg btn-google btn-block text-uppercase btn_abrir_cadastro"><i class="fab fa-google mr-2"></i> Cadastrar</button>
						</form>
						<form class="form-signin form_cadastro">
							<div class="form-label-group">
								<input type="text" id="cad_nome" class="form-control" placeholder="nome" required autofocus>
								<label for="cad_nome">Nome</label>
							</div>
							<div class="form-label-group">
								<input type="text" id="cad_usuario" class="form-control" placeholder="usuário de login" required autofocus>
								<label for="cad_usuario">Usuário</label>
							</div>
							<div class="form-label-group">
								<input type="password" id="cad_senha" class="form-control" placeholder="senha" required>
								<label for="cad_senha">Senha</label>
							</div>
							<img id="ajax-img-cadastro" class="loading-ajax-img" src="<?= base_url() ?>img/ajax-loader.gif" alt="">
							<button class="btn btn-lg btn-google btn-block text-uppercase btn_realizar_cadastro"><i class="fab fa-google mr-2"></i> Cadastrar</button>
							<button class="btn btn-lg btn-primary btn-block text-uppercase btn_voltar_login">Voltar para o login</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</html>

<script>
	$('.btn_abrir_cadastro').click(function(e) {
		e.preventDefault();
		$('.alert_sucesso').hide();
		$('.alert_erro').hide();
		$('.form_login').hide();
		$('.form_cadastro').show();
	});

	$('.btn_voltar_login').click(function(e) {
		e.preventDefault();
		$('.alert_sucesso').hide();
		$('.alert_erro').hide();
		$('.form_login').show();
		$('.form_cadastro').hide();
	});

	$('.btn_realizar_cadastro').click(function(e) {
		e.preventDefault();
		$('.alert_sucesso').hide();
		$('.alert_erro').hide();
		let nome = $('#cad_nome').val();
		let usuario = $('#cad_usuario').val();
		let senha = $('#cad_senha').val();

		if (nome != '' && usuario != '' && senha != '') {
			$('.btn_realizar_cadastro').hide();
			$('#ajax-img-cadastro').show();
			let dados = {
				nome: nome,
				usuario: usuario,
				senha: senha
			}
			let url = base_url + "register";
			requisicao(dados, url, 2);
		} else {
			$('.btn_realizar_cadastro').show();
			$('.loading-ajax-img').hide();
			$('.alert_sucesso').hide();
			$('#alert_erro_p').text('Por favor, preencha todos os campos.');
			$('.alert_erro').show();
		}

	});

	$('.btn_logar').click(function(e) {
		e.preventDefault();
		$('.alert_sucesso').hide();
		$('.alert_erro').hide();
		let usuario = $('#log_usuario').val();
		let senha = $('#log_senha').val();

		if (usuario != '' && senha != '') {
			$('.btn_logar').hide();
			$('#ajax-img-login').show();
			let dados = {
				usuario: usuario,
				senha: senha
			}
			let url = base_url + "auth";
			requisicao(dados, url, 1);
		} else {
			$('.btn_logar').show();
			$('.loading-ajax-img').hide();
			$('.alert_sucesso').hide();
			$('#alert_erro_p').text('Por favor, preencha todos os campos.');
			$('.alert_erro').show();
		}

	});

	function requisicao(dados, url, tipo) {
		$.ajax({
				url: url,
				type: 'POST',
				dataType: 'json',
				data: dados
			})
			.done(function(server) {
				$('.loading-ajax-img').hide();
				if (tipo == 2) {
					if (server.status == 200) {
						$('.btn_realizar_cadastro').hide();
						$('.btn_voltar_login').hide();
						$('.alert_sucesso').show();
						$('.alert_erro').hide();
						$('#alert_sucesso_p').text('Cadastro efetuado com sucesso!');
						setTimeout(() => {
							$('#alert_sucesso_p').text('Você será redirecionado...');
							$('.loading-ajax-img').show();
							setTimeout(() => {
								location.reload();
							}, 1500);
						}, 1500);
					} else {
						$('.alert_sucesso').hide();
						$('.alert_erro').show();
						$('#alert_erro_p').text('Usuário já cadastrado, tente outro.');
						$('.btn_realizar_cadastro').show();
					}
				} else {
					if (server.status == 200 && tipo == 1) {
						$('.alert_sucesso').show();
						$('.alert_erro').hide();
						$('#alert_sucesso_p').text('Login efetuado com sucesso!');
						$('.btn_logar').hide();
						$('.btn_abrir_cadastro').hide();
						setTimeout(() => {
							location.reload();
						}, 1000);
					} else {
						$('.alert_sucesso').hide();
						$('.alert_erro').show();
						$('#alert_erro_p').text('Usuário ou senha incorretos.');
						$('.btn_logar').show();
					}
				}

			})

	}
</script>