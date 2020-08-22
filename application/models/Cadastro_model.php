<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro_model extends CI_Model {

	public $tabela = "usuario";
    
    public function salvar($dados)
	{	
		return $this->db->insert($this->tabela, $dados);
    }
    
}
