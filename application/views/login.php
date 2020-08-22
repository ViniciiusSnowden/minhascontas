<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Minhas Contas</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/login.css">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
				<div class="card card-signin my-5">
					<div class="card-body">
						<h5 class="card-title text-center">Acessar</h5>
						<div class="alert alert-success alert_sucesso" role="alert">
							Cadastrado com sucesso!
						</div>
						<div class="alert alert-danger alert_erro" role="alert">
							Por favor, preencha todos os campos.
						</div>
						<form class="form-signin form_login">
							<div class="form-label-group">
								<input type="text" id="inputEmail" class="form-control" placeholder="Login" required autofocus>
								<label for="inputEmail">Login</label>
							</div>
							<div class="form-label-group">
								<input type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
								<label for="inputPassword">Senha</label>
							</div>
							<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Entrar</button>
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
							<button class="btn btn-lg btn-google btn-block text-uppercase btn_realizar_cadastro"><i class="fab fa-google mr-2"></i> Cadastrar</button>
							<button class="btn btn-lg btn-primary btn-block text-uppercase btn_voltar_login">Voltar para o login</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="<?= base_url(); ?>js/login/index.js"></script>

</html>