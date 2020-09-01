<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contas extends CI_Controller
{
    private $id_usuario;

    public function __construct()
    {
        date_default_timezone_set('America/Sao_Paulo');
        parent::__construct();
        $this->load->model('Contas_model');
        $this->id_usuario = $this->session->userdata['id_usuario'];
        $this->load->helper('util');
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
        $dadosAjax['valor'] = tratarValorToSql($dadosAjax['valor']);
        $dadosAjax['data_cadastro'] = date("Y-m-d H:i:s", time());
        $dadosAjax['id_usuario'] = $this->id_usuario;
        $this->Contas_model->inserir($dadosAjax);

        $dadosRetorno['status']         = 200;
        $dadosRetorno['response']       = 'Cadastro efetuado!';
        $this->json($dadosRetorno);
    }

    public function listarContas()
    {
        $dados = $this->Contas_model->listarContasUsuario($this->id_usuario);
        $response = [];
        if (count($dados) > 0) {
            foreach ($dados as $key => $value) {
                $response[$key]['id'] = $value->id;
                $bandage = $value->status == 1 ? '<span class="badge badge-success">Pago</span>' : '<span class="badge badge-warning">Pendente</span>';
                $response[$key]['descricao'] = '<a class="linhaEditar" href="javascript:void(0)" data-id="' . $value->id . '">' . $value->descricao . ' ' . $bandage . '</a>';
                $response[$key]['status'] = $value->status;
                $response[$key]['data_vencimento'] = dataToBr($value->data_vencimento);
            }
        }
        $this->json($response);
    }

    public function listarContaPorId()
    {
        $id_conta = $this->uri->segment(3);
        if (is_numeric($id_conta)) {
            $dados = $this->Contas_model->listarContaUsuarioPorId($this->id_usuario, $id_conta);
            if ($dados != null) {
                $dados['valor_br'] = number_format($dados['valor'], 2, ",", ".");
                $this->json($dados);
            } else {
                $dadosErro['codigo'] = 350;
                $dadosErro['erro']   = 'Registro não encontrado.';
                $this->json($dadosErro);
            }
        } else {
            parametroNaoNumerico();
        }
    }

    public function salvarEdicao()
    {
        $id_conta = $this->uri->segment(3);
        if (is_numeric($id_conta)) {
            $dadosAjax = $this->input->post();
            $dadosAjax['valor'] = tratarValorToSql($dadosAjax['valor']);
            $this->Contas_model->salvar($dadosAjax,$id_conta, $this->id_usuario);
            $dadosRetorno['status']         = 200;
            $dadosRetorno['response']       = 'Conta alterada!';
            $this->json($dadosRetorno);
        }else{
            parametroNaoNumerico();
        }
    }

    public function deletar()
    {
        $id_conta = $this->uri->segment(3);
        if (is_numeric($id_conta)) {
            $dadosAjax['removido'] = 'S'; 
            $this->Contas_model->salvar($dadosAjax,$id_conta, $this->id_usuario);
            $dadosRetorno['status']         = 200;
            $dadosRetorno['response']       = 'Conta Excluída.';
            $this->json($dadosRetorno);
        }else{
            parametroNaoNumerico();
        }
    }

    private function json($dados, $status = 200){
        $this->output
            ->set_content_type('application/json')
            ->set_status_header($status)
            ->set_output(json_encode($dados));
    }
}
