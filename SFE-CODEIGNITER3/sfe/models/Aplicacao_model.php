<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Aplicacao_model extends MY_NewModel
{

	public $tabelaNome = 'administracao_aplicacao';
	public $columnDesc = 'titulo';

	function __construct()
	{
		parent::__construct();
	}
}
