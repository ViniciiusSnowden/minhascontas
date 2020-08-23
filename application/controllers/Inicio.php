<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inicio extends CI_Controller
{
	public function __construct()
	{
		date_default_timezone_set('America/Sao_Paulo');
		parent::__construct();
		$this->load->model('Cadastro_model');	
	}

	public function index()
	{
		$dadosView['meio'] = 'inicio/index';
        $this->load->view('tema/tema', $dadosView);
    }
}