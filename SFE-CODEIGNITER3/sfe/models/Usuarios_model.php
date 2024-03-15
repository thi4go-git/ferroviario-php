<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios_model extends MY_NewModel
{

	public $tabelaNome = 'sfe.esfeUsuarios';
	public $columnDesc = 'deEnderecoEmail';
	public $columnID = 'idUsuario';

	protected $db;

	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('sfe', true);

		//$this->load->model('sfe/solicitantes_model');
	}


	public function obterPorValidacao($username = '', $senha = '')
	{
		$this->setWhere($this->columnDesc, $username);
		$this->setWhere('deSenha', $senha);

		$usuario = $this->getResult();

		//$usuario->solicitante = $this->solicitantes_model
		//	->readById($usuario->idSolicitante);

		return (sizeof($usuario) == 1) ? $usuario[0] : null;
	}
}
