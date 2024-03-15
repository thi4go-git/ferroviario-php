<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MenuItem_model extends MY_NewModel
{

	public $tabelaNome = 'administracao_menuitem';
	public $columnDesc = 'titulo';

	function __construct()
	{
		parent::__construct();
	}

	public function browseByApplicationActives($productId, $parentId)
	{
		$this->setWhere('administracao_aplicacao_id', $productId);
		$this->setWhere('administracao_menuitem_id', $parentId);
		$this->setWhere('situacao', 'A');
		return $this->getResult();
	}
}
