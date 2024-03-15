<?php
defined('BASEPATH') or exit('No direct script access allowed');

use mikehaertl\wkhtmlto\Pdf;

class Solicitante extends Produto_SFE
{

	function __construct()
	{
		
		$this->dados['H1'] = 'Solicitantes Cadastrados';
		$this->dados['urlListagem'] = 'sfe/admin/solicitante';
		$this->dados['urlVisualizar'] = 'sfe/admin/solicitante/visualizar/';
        $this->dados['urlImprimir'] = 'sfe/admin/solicitante/imprimir/';
		
		parent::__construct();
		validarSeEstaLogado();

		$this->load->model('solicitantes_model');

	}

	public function index()
	{
		$this->listar();
	}

	public function listar()
	{
		$this->dados['listagem'] = $this->solicitantes_model->browseByPermission();
		$this->template->render(__FILE__, __FUNCTION__, $this->dados);
	}

	public function visualizar($idsolicitante = null)
	{
		if (!is_null($idsolicitante)) {
			$solicitante = $this->solicitantes_model->readById($idsolicitante);
			if (is_null($solicitante)) {
				redirect('error404', 'refresh');
			}  else {
				$this->dados['solicitante'] = (array)$solicitante;
			}
		} else {
			redirect('error404', 'refresh');
		}
		$this->template->render(__FILE__, __FUNCTION__, $this->dados);
	}

	function imprimir() {
		$dados['dados'] = $this->solicitantes_model->all();
        $this->load->library('relatorio_wk', [
            'caminhoTemplateRelatorio' => 'sfe/admin/Solicitante/template_relatoriosolicitante',
            'dados' => [
                'tituloRelatorio' => 'Relação de Inscritos',
                'tituloModulo' => 'SFE - Sistema Ferroviário Estadual',
                'dados' => $dados,
            ],
			'options' => [
				'orientation' => 'landscape',
				'header-spacing' => '5',
			]
        ]);
        $this->relatorio_wk->send();
	}

	public function excluir($cdContaContabil)
	{
		$contaContabil = $this->solicitantes_model->readById($cdContaContabil);
		$resultado = $this->solicitantes_model->delete($contaContabil);

		if ($resultado === true) {
			$this->mensagemExcluir($resultado, $contaContabil->nmContaContabil,  $this->dados['urlListagem']);
		} else {
			definirAlerta('danger', 'Não foi possível excluir conta contábil porque há elementos que dependem dela.');
			$this->listar();
		}
		
	}

	public function alternar($cdContaContabil)
	{
		alternarFlag(
			$cdContaContabil,
			$this->solicitantes_model,
			[
				'entidade' => 'Conta Contábil',
				'campoDescritivo' => 'nmContaContabil',
				'urlDirecionamento' => $this->dados['urlListagem'],
				'apihorario_model' => $this->apihorario_model,
			]
		);
	}

}
