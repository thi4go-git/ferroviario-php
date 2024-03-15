<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Arquivos_model extends MY_NewModel
{

	public $tabelaNome = 'sfe.esfeArquivos';
	public $columnDesc = 'nome';
	public $columnID = 'idArquivo';

	protected $db;

	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('sfe', true);
	}

	public function getBySolicitante($idSolicitante)
    {
        $arquivos =  $this->db->where('idSolicitante', $idSolicitante)
			->order_by('nuOrdem', 'ASC')
			->get($this->tabelaNome)->result('array');
		return $arquivos;
    }

}
