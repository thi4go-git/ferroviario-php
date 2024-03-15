<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Solicitantes_model extends MY_NewModel
{

	public $tabelaNome = 'sfe.esfeSolicitantes';
	public $columnDesc = 'nmSolicitante';
	public $columnID = 'idSolicitante';

	protected $db;

	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('sfe', true);
		$this->load->model('sfe/arquivos_model');
	}

	function readById($idSolicitante, $buscarNaView = false)
	{
		$solicitante = parent::readById($idSolicitante);
		$solicitante->arquivos = $this->arquivos_model
			->getBySolicitante($idSolicitante);
		return $solicitante;
	}

	public function all()
	{
		$db = $this->db->select('can.idSolicitante, can.nuCpfCnpj, can.nmSolicitante,
		can.deLogradouro, can.deComplemento, can.deSetor, can.nmCidade,
		can.sgEstado, can.nuTelefoneComercial, can.nuTelefoneCelular, 
		can.dtCadastro, can.deEnderecoEmail, count(arq.idArquivo) as nuTotalArquivos')
			->from('sfe.esfeSolicitantes can')
			->join('sfe.esfeArquivos arq', 'can.idSolicitante = arq.idSolicitante', 'left')
			->group_by('can.idSolicitante, can.nuCpfCnpj, can.nmSolicitante,
			can.deLogradouro, can.deComplemento, can.deSetor, can.nmCidade,
			can.sgEstado, can.nuTelefoneComercial, can.nuTelefoneCelular, 
			can.dtCadastro, can.deEnderecoEmail')
			->order_by('can.nmSolicitante', 'ASC');
		return $db->get()->result('array');
	}

	public function updateSolicitante($idSolicitante, $dadosAtualizados)
	{
		$this->db->where('idSolicitante', $idSolicitante);
		$this->db->update($this->tabelaNome, $dadosAtualizados);
		return $this->db->affected_rows() > 0;
	}
}
