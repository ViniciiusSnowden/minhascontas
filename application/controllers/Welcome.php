<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{	
		date_default_timezone_set('America/Sao_Paulo');
		parent::__construct();
		$this->load->model('Cadastro_model');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function cadastrar()
	{
		$dadosAjax = $this->input->post();
		$validar = $this->verificarUsuario(trim($dadosAjax['usuario']));
		if (!$validar) {
			$dadosAjax['senha'] 		= sha1(md5(trim($dadosAjax['senha'])) . '$_key');
			$dadosAjax['data_cadastro'] = date("Y-m-d H:i:s", time());
			$id = $this->Cadastro_model->salvar($dadosAjax);
			$sessao['nome'] = $dadosAjax['nome'];
			$sessao['id_usuario'] = $id;
			$this->session->set_userdata($sessao);
			$dadosRetorno['status'] 	= 200;
			$dadosRetorno['response'] 	= 'Cadastro efetuado';
		} else {
			$dadosRetorno['status'] 	= 500;
			$dadosRetorno['response'] 	= 'Usuário já cadastrado.';
		}

		echo json_encode($dadosRetorno);
	}

	public function realizarLogin()
	{
		$login = $this->input->post('usuario');
		$senha = sha1(md5(trim($this->input->post('senha'))) . '$_key');
		$res   = $this->Cadastro_model->verificarUsuario(trim($login), $senha);
		if ($res) {
			$sessao['nome'] = $res['nome'];
			$sessao['id_usuario'] = $res['id'];
			$this->session->set_userdata($sessao);
			$dadosRetorno['status'] = 200;
			$dadosRetorno['response'] = 'Login efetuado com sucesso!';
		} else {
			$dadosRetorno['status'] = 500;
			$dadosRetorno['response'] = 'Usuário ou senha inválidos.';
		}
		echo json_encode($dadosRetorno);
	}

	private function verificarUsuario($usuario, $senha = false)
	{
		$res = $this->Cadastro_model->verificarUsuario($usuario, $senha);
		if ($res != null) {
			return $res;
		} else {
			return false;
		}
	}

	public function sair(){
		$this->session->sess_destroy();
		echo true;
	}

}
