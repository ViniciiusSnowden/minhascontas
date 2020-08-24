<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contas extends CI_Controller
{
    public function __construct()
    {
        date_default_timezone_set('America/Sao_Paulo');
        parent::__construct();
        $this->load->model('Cadastro_model');
    }

    public function index()
    {
        $dadosView['meio'] = 'contas/index';
        $dadosView['js']   = 'contas/js';
        $this->load->view('tema/tema', $dadosView);
    }

    public function salvarNovaConta()
    {
        $dadosAjax = $this->input->post();
        $dadosAjax['valor'] = $this->tratarValor($dadosAjax['valor']);
        $id = $this->session->userdata['id_usuario'];
        $dadosAjax['id_usuario'] = $id;
        $this->Cadastro_model->salvar($dadosAjax, 'contas');

        $dadosRetorno['status']         = 200;
        $dadosRetorno['response']       = 'Cadastro efetuado';
        echo json_encode($dadosRetorno);
    }

    private function tratarValor($valor)
    {
        $v1 = explode('R$', $valor);
        $valor = str_replace(".", "", $v1[1]);
        $valor = str_replace(",", ".", $valor);
        return $valor;
    }

    public function listarContas()
    {
        $id = $this->session->userdata['id_usuario'];
        $dados = $this->Cadastro_model->listarContasUsuario($id, 'contas');
        $response = [];
        if(count($dados) > 0){
            foreach ($dados as $key => $value) {
                $response[$key]['id'] = $value->id;
                $bandage = $value->status == 1? '<span class="badge badge-success">Pago</span>': '<span class="badge badge-warning">Pendente</span>';
                $response[$key]['descricao'] = $value->descricao.' '.$bandage;
                $response[$key]['status'] = $value->status;
            }
        }
        echo json_encode($response);
    }
}
