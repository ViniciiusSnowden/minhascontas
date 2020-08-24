<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cadastro_model extends CI_Model
{

	public $tabela = "usuario";
	public $tabelaContas = "contas";

	public function salvar($dados, $tabela)
	{
		return $this->db->insert($tabela, $dados);
	}

	public function verificarUsuario($usuario, $senha)
	{
		$this->db->select('*');
		$this->db->where('usuario = ', $usuario);
		if ($senha) {
			$this->db->where('senha = ', $senha);
		}
		return $this->db->get($this->tabela)->result();
	}

	public function listarContasUsuario($id, $tabela)
	{
		$this->db->select('id,descricao,status');
		$this->db->where('id_usuario = ', $id);
		$this->db->where('removido = "N"');
		$this->db->order_by('id desc');
		return $this->db->get($tabela)->result();
	}

	public function listarTudoDash($id, $tabela)
	{
		$this->db->select('sum(valor) as total, count(id) as qtd');
		$this->db->where('id_usuario = ', $id);
		$this->db->where('removido = "N"');
		return $this->db->get($tabela)->result();
	}

	public function listarTudoPagoDash($id, $tabela)
	{
		$this->db->select('sum(valor) as total, count(id) as qtd');
		$this->db->where('id_usuario = ', $id);
		$this->db->where('status = 1');
		$this->db->where('removido = "N"');
		return $this->db->get($tabela)->result();
	}

	public function listarTudoPendenteContDash($id, $tabela)
	{
		$this->db->select('count(id) as total');
		$this->db->where('id_usuario = ', $id);
		$this->db->where('status = 0');
		$this->db->where('removido = "N"');
		return $this->db->get($tabela)->result();
	}
}
