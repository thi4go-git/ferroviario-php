<?php
defined('BASEPATH') or exit('No direct script access allowed');

require MODULESPATH . 'administracao/models/sistema/Aplicacao_model.php';

class Aplicacao extends Produto_SFE
{

	function __construct()
	{
		parent::__construct();

		$this->dados['H1'] = 'Aplicações';
		$this->dados['urlCadastrar'] = 'administracao/sistema/Aplicacao/cadastrar';
		$this->dados['urlListagem'] = 'administracao/sistema/Aplicacao';
		$this->dados['urlEditar'] = 'administracao/sistema/Aplicacao/editar/';
		$this->dados['urlAlternar'] = 'administracao/sistema/Aplicacao/alternar/';

		$this->load->model('aplicacao_model');
	}

	public function dashboard()
	{
		$this->dados['listagem'] = $this->aplicacao_model->browseActives();
		$this->template->render(__FILE__, __FUNCTION__, $this->dados);
	}

	public function index()
	{
		$this->listar();
	}

	public function listar()
	{
		$this->dados['listagem'] = $this->aplicacao_model->browse();
		$this->template->render(__FILE__, __FUNCTION__, $this->dados);
	}

	public function cadastrar()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('titulo', 'Título', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('sigla', 'Sigla Abreviada', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('url', 'URL', 'trim|required|min_length[1]');
		// $this->form_validation->set_rules('logotipo', 'Logotipo (URL)', '');

		if ($this->form_validation->run()) {
			$dtoInsert = $this->getFormData($this->input->post(), ['titulo', 'sigla', 'url', 'logotipo', 'contexto_aplicacao_id',]);

			$this->mensagemCadastrar($this->aplicacao_model->add($dtoInsert), $dtoInsert['titulo']);
		} else if (validation_errors()) {
			definirAlerta('warning', validation_errors());
		}

		$this->template->render(__FILE__, __FUNCTION__, $this->dados);
	}

	public function editar($id = null)
	{
		if (!is_null($id)) {
			$this->dados['aplicacao'] = $this->aplicacao_model->readById($id);
			if (is_null($this->dados['aplicacao'])) {
				show_404();
			}
		} else {
			show_404();
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules('titulo', 'Título', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('sigla', 'Sigla Abreviada', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('url', 'URL', 'trim|required|min_length[1]');

		if ($this->form_validation->run() == false) {
			if (validation_errors()) {
				definirAlerta('warning', validation_errors());
			}
		} else {
			$arrayDadosFormulario = [
				'titulo',
				'sigla',
				'url',
				'logotipo',
				'contexto_aplicacao_id',
			];
			$dtoFormulario = $this->getDataFromForm($this->input->post(), $arrayDadosFormulario);

			$dtoUpdate['id'] = $this->dados['aplicacao']->id;
			$dtoUpdate['titulo'] = $dtoFormulario['titulo'];
			$dtoUpdate['sigla'] = $dtoFormulario['sigla'];
			$dtoUpdate['url'] = $dtoFormulario['url'];
			$dtoUpdate['logotipo'] = $dtoFormulario['logotipo'];
			$dtoUpdate['contexto_aplicacao_id'] = $dtoFormulario['contexto_aplicacao_id'];

			if ($this->aplicacao_model->edit($dtoUpdate)) {
				$this->dados['aplicacao'] = $this->aplicacao_model->readById($id);
				definirAlerta('success', 'Aplicação <strong>' . $dtoUpdate['titulo'] . '</strong> atualizado(a).');
			} else {
				definirAlerta('warning', 'Não foram realizadas alterações.');
			}
		}

		$this->template->render(__FILE__, __FUNCTION__, $this->dados);
	}

	public function alternar($id)
	{
		alternarVisibilidade(
			$id,
			$this->aplicacao_model,
			[
				'entidade' => 'Aplicação',
				'campoDescritivo' => 'titulo',
				'urlDirecionamento' => 'administracao/sistema/Aplicacao',
				'apihorario_model' => $this->apihorario_model,
			]
		);
	}
}
