<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cadastro_model extends CI_Model
{
	private $tabela = 'usuario';

	public function salvar($dados)
	{
		return $this->db->insert($this->tabela, $dados);
	}

	public function verificarUsuario($usuario, $senha)
	{
		$this->db->select('id,nome');
		$this->db->where('usuario = ', $usuario);
		if ($senha) {
			$this->db->where('senha = ', $senha);
		}
		return $this->db->get($this->tabela)->row_array();
	}

}
