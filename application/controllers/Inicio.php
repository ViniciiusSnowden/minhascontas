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

	public function listarDadosDash()
	{
		$id 				= $this->session->userdata['id_usuario'];
		$resTotalReceita  	= $this->Contas_model->getReceita($id);
		$resTotalDespesa	= $this->Contas_model->getDespesa($id);
		$resTotalDespesaTotal	= $this->Contas_model->getDespesaTotalValor($id);
		$resQtdTotalDespesa	= $this->Contas_model->getQtdDespesa($id);
		$resQtdTotalDespesaGeral = $this->Contas_model->getDespesaTotal($id);
		$resQtdTotalDespesaGeralPago = $this->Contas_model->getDespesaTotalPago($id);

		$totalReceita  = $resTotalReceita['total'] != null ? $resTotalReceita['total'] : 0;
		$totalDespesa  = $resTotalDespesa['total'] != null ? $resTotalDespesa['total'] : 0;

		$saldo = $totalReceita - $totalDespesa;

		$porcentagemPago = 0;

		if ($resQtdTotalDespesaGeral['total'] > 0) {
			$porcentagemPago = ($resQtdTotalDespesaGeralPago['total'] * 100) / $resQtdTotalDespesaGeral['total'];
		}

		$res['saldo']   	= number_format($saldo, 2, ",", ".");
		$res['despesa_total'] 	= number_format($resTotalDespesaTotal['total'], 2, ",", ".");
		$res['despesa'] 	= number_format($totalDespesa, 2, ",", ".");
		$res['qtd_pendente'] = $resQtdTotalDespesa['total'];
		$res['porcentagem_pago'] = number_format($porcentagemPago, 0, '.', ',');
		echo json_encode($res);
	}
}
