<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contas_model extends CI_Model
{
	private $tabela = 'contas';

	public function inserir($dados)
	{
		return $this->db->insert($this->tabela, $dados);
	}

	public function listarContasUsuario($id)
	{
		$this->db->select('id,descricao,status,data_vencimento, tipo_conta');
		$this->db->where('id_usuario = ', $id);
		$this->db->where('removido = "N"');
		$this->db->order_by('data_vencimento asc');
		return $this->db->get($this->tabela)->result();
	}

	public function getReceita($id)
	{
		$this->db->select('sum(valor) as total');
		$this->db->where('id_usuario = ', $id);
		$this->db->where('tipo_conta = 1');
		$this->db->where('status = 1');
		$this->db->where('removido = "N"');
		return $this->db->get($this->tabela)->row_array();
	}

	public function getDespesa($id)
	{
		$this->db->select('sum(valor) as total');
		$this->db->where('id_usuario = ', $id);
		$this->db->where('tipo_conta = 0');
		$this->db->where('status = 1');
		$this->db->where('removido = "N"');
		return $this->db->get($this->tabela)->row_array();
	}

	public function getDespesaTotalValor($id)
	{
		$this->db->select('sum(valor) as total');
		$this->db->where('id_usuario = ', $id);
		$this->db->where('tipo_conta = 0');
		$this->db->where('removido = "N"');
		return $this->db->get($this->tabela)->row_array();
	}

	public function getDespesaTotal($id)
	{
		$this->db->select('count(id) as total');
		$this->db->where('id_usuario = ', $id);
		$this->db->where('tipo_conta = 0');
		$this->db->where('removido = "N"');
		return $this->db->get($this->tabela)->row_array();
	}

	public function getDespesaTotalPago($id)
	{
		$this->db->select('count(id) as total');
		$this->db->where('id_usuario = ', $id);
		$this->db->where('tipo_conta = 0');
		$this->db->where('status = 1');
		$this->db->where('removido = "N"');
		return $this->db->get($this->tabela)->row_array();
	}

	public function getQtdDespesa($id)
	{
		$this->db->select('count(id) as total');
		$this->db->where('id_usuario = ', $id);
		$this->db->where('tipo_conta = 0');
		$this->db->where('status = 0');
		$this->db->where('removido = "N"');
		return $this->db->get($this->tabela)->row_array();
	}

	public function listarContaUsuarioPorId($id_usuario, $id)
	{
		$this->db->select('descricao,valor,data_vencimento,status,tipo_conta');
		$this->db->where('id_usuario = ', $id_usuario);
		$this->db->where('id = ', $id);
		$this->db->where('removido = "N"');
		return $this->db->get($this->tabela)->row_array();
	}

	public function salvar($dados, $id, $id_usuario)
	{
		$this->db->where('id = ', $id);
		$this->db->where('id_usuario = ', $id_usuario);
		$this->db->update($this->tabela, $dados);
	}
}
