<?php
defined('BASEPATH') or exit('No direct script access allowed');

require MODULESPATH . 'administracao/models/sistema/MenuItem_model.php';
require MODULESPATH . 'administracao/models/sistema/Aplicacao_model.php';

class MenuItem extends Produto_SFE
{

	function __construct()
	{
		parent::__construct();

		$this->dados['H1'] = 'Menu de Aplicação';
		$this->dados['urlCadastrar'] = 'administracao/sistema/MenuItem/cadastrar';
		$this->dados['urlListagem'] = 'administracao/sistema/MenuItem';
		$this->dados['urlEditar'] = 'administracao/sistema/MenuItem/editar/';
		$this->dados['urlAlternar'] = 'administracao/sistema/MenuItem/alternar/';

		$this->load->model('menuitem_model');
		$this->load->model('aplicacao_model');
	}

	public function index()
	{
		$this->listar();
	}

	public function listar()
	{
		$this->dados['listagem_aplicacaoes'] = $this->aplicacao_model->browse();
		$this->dados['listagem'] = array();
		$listagem_menuitens = $this->menuitem_model->browse();

		foreach ($listagem_menuitens as $item) {
			$item->administracao_aplicacao_titulo = valorDaChave(
				$this->dados['listagem_aplicacaoes'],
				$item->administracao_aplicacao_id
			)->titulo;
			$pai = valorDaChave($listagem_menuitens, $item->administracao_menuitem_id);
			$item->administracao_menuitem_titulo = ($pai) ? $pai->titulo : null;
			array_push($this->dados['listagem'], $item);
		}
		$this->template->render(__FILE__, __FUNCTION__, $this->dados);
	}

	public function cadastrar()
	{
		$this->dados['listagem_aplicacaoes'] = $this->aplicacao_model->browse();
		$this->dados['listagem_menuitens'] = array();
		$listagem_menuitens = $this->menuitem_model->browse();

		foreach ($listagem_menuitens as $item) {
			$item->administracao_aplicacao_titulo = valorDaChave(
				$this->dados['listagem_aplicacaoes'],
				$item->administracao_aplicacao_id
			)->titulo;
			array_push($this->dados['listagem_menuitens'], $item);
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('titulo', 'Título', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('url', 'Url', 'required|trim|min_length[1]');
		$this->form_validation->set_rules('administracao_aplicacao_id', 'Aplicação', 'required');
		$this->form_validation->set_rules('situacao', 'Situação', 'required');

		if ($this->form_validation->run()) {
			$dtoInsert = $this->getFormData($this->input->post(), [
				'titulo', 'icone', 'url',
				'administracao_aplicacao_id',
				'administracao_menuitem_id',
				'situacao',
			]);

			if ($this->menuitem_model->add($dtoInsert)) {
				if ($dtoInsert['administracao_menuitem_id']) {
					$dtoPai = $this->menuitem_model->readById($dtoInsert['administracao_menuitem_id']);
					$dtoPai->submenus++;
					$this->menuitem_model->edit($dtoPai);
				}
				definirAlerta('success', $this->dados['H1'] . ' <strong>' . $dtoInsert['titulo'] . '</strong> cadastrado(a).');
			} else {
				definirAlerta('warning', 'Não foram realizadas alterações.');
			}
		} else if (validation_errors()) {
			definirAlerta('warning', validation_errors());
		}

		$this->template->render(__FILE__, __FUNCTION__, $this->dados);
	}

	public function editar($id = null)
	{
		if (!is_null($id)) {

			$this->dados['item'] = $this->menuitem_model->readById($id);
			if (is_null($this->dados['item'])) {
				redirect('error404', 'refresh');
			}
		} else {
			redirect('error404', 'refresh');
		}
		$paiAntigoItemId = $this->dados['item']->administracao_menuitem_id;
		$this->dados['listagem_aplicacaoes'] = $this->aplicacao_model->browse();
		$this->dados['listagem_menuitens'] = array();
		$listagem_menuitens = $this->menuitem_model->browse();

		foreach ($listagem_menuitens as $item) {
			$item->administracao_aplicacao_titulo = valorDaChave(
				$this->dados['listagem_aplicacaoes'],
				$item->administracao_aplicacao_id
			)->titulo;
			array_push($this->dados['listagem_menuitens'], $item);
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('titulo', 'Título', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('url', 'Url', 'required|trim|min_length[1]');
		$this->form_validation->set_rules('administracao_aplicacao_id', 'Aplicação', 'required');
		$this->form_validation->set_rules('situacao', 'Situação', 'required');

		if ($this->form_validation->run()) {
			$dtoUpdate = $this->getFormObject($this->input->post(), [
				'titulo', 'icone', 'url',
				'administracao_aplicacao_id',
				'administracao_menuitem_id',
				'situacao',
			]);
			$dtoUpdate->id = $this->dados['item']->id;

			if ($this->menuitem_model->edit($dtoUpdate)) {
				if ($dtoUpdate->administracao_menuitem_id != $paiAntigoItemId) {
					if (!is_null($paiAntigoItemId)) {
						$paiAntigoItem = $this->menuitem_model->readById($paiAntigoItemId);
						$paiAntigoItem->submenus--;
						$this->menuitem_model->edit($paiAntigoItem);
					}
					if (!is_null($dtoUpdate->administracao_menuitem_id)) {
						$dtoPai = $this->menuitem_model->readById($dtoUpdate->administracao_menuitem_id);
						$dtoPai->submenus++;
						$this->menuitem_model->edit($dtoPai);
					}
				}
				definirAlerta('success', $this->dados['H1'] . ' <strong>' . $dtoUpdate->titulo . '</strong> atualizado(a).');
			} else {
				definirAlerta('warning', 'Não foram realizadas alterações.');
			}

		} else if (validation_errors()) {
			definirAlerta('warning', validation_errors());
		}

		$this->template->render(__FILE__, __FUNCTION__, $this->dados);
	}

	public function alternar($id)
	{
		alternarVisibilidade(
			$id,
			$this->menuitem_model,
			[
				'entidade' => 'Menu Item',
				'campoDescritivo' => 'titulo',
				'urlDirecionamento' => 'administracao/sistema/MenuItem',
				'apihorario_model' => $this->apihorario_model,
			]
		);
	}
}
