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
		$dadosAjax['senha'] 		= sha1(md5($dadosAjax['senha']) . '$_key');
		$dadosAjax['data_cadastro'] = date("Y-m-d H:i:s",time());
		echo  json_encode($this->Cadastro_model->salvar($dadosAjax));
	}
}
