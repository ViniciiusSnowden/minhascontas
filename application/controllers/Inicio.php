<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inicio extends CI_Controller
{
	public function __construct()
	{
		date_default_timezone_set('America/Sao_Paulo');
		parent::__construct();
		$this->load->model('Contas_model');
	}

	public function index()
	{
		$dadosView['meio'] = 'inicio/index';
		$dadosView['js'] = 'inicio/js';
        $this->load->view('tema/tema', $dadosView);
	}

	public function listarDadosDash(){
		$id 			= $this->session->userdata['id_usuario'];
		$total 			= $this->Contas_model->listarTudoDash($id);
		$valorTotalPago = $this->Contas_model->listarTudoPagoDash($id);
		$totalPed 		= $this->Contas_model->listarTudoPendenteContDash($id);

		if($total[0]->qtd > 0){
			$porcentagemPago = ($valorTotalPago[0]->qtd*100)/$total[0]->qtd;
		}else{
			$porcentagemPago = 0;
		}
		$res['total'] 			= $total[0]->total > 0 ? number_format($total[0]->total,2,",",".") : '0,00';
		$res['totalPago'] 		= $valorTotalPago[0]->total > 0 ? number_format($valorTotalPago[0]->total,2,",",".") : '0,00';
		$res['totalPendente'] 	= $totalPed[0]->total;
		$res['PorctPag'] 		= number_format($porcentagemPago, 0, '.', ',');

		echo json_encode($res);
	}
}