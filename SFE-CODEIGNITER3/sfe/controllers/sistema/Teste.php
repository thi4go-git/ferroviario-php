<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teste extends CI_Controller
{

	protected $dados = [];

	function __construct()
	{
		parent::__construct();
		$this->load->library('Blade');

		$this->dados['variavel'] = 'Aplicações';
	}

	public function index()
	{
		$this->blade->render(
			'sfe/teste', $this->dados
		);
	}

	public function enviar() 
	{
		$this->dados['mensagem'] = 'Valores enviados com sucesso';
		$this->index();
	}

}
