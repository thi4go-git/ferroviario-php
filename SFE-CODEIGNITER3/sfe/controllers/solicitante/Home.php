<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	protected $dados = [];

	function __construct()
	{
		parent::__construct();
		$this->load->library('Blade');

		$this->dados['variavel'] = 'SFE - Sistema Ferroviário';

		$this->load->model('sfe/solicitantes_model');
	}

	public function index()
	{
		$solicitanteSfeSession = get_instance()->session->solicitantesfe('solicitante_sfe_logado');
		if ($solicitanteSfeSession != null) {
			$idsolicitante = $solicitanteSfeSession->idSolicitante;
		} else {
			definirAlerta('danger', 'Acesso Restrito!');
			redirect('sfe/solicitante/autenticacao', 'refresh');
		}

		$solicitante = $this->solicitantes_model->readById($idsolicitante);
		$this->dados['solicitante'] = (array)$solicitante;

		$this->blade->render(
			'sfe/solicitante/home',
			$this->dados
		);
	}

	public function editar()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			$dadosAtualizados = array(
				//'nuCpfCnpj' => str_replace(array('.', '-', ' '), '', $_POST["nuCpfCnpj"]),
				//'nmSolicitante' => $_POST["nmSolicitante"],
				'nmResponsavelEmpresa' => $_POST["nmResponsavelEmpresa"],
				'deEnderecoEmail' => $_POST["deEnderecoEmail"],
				'deLogradouro' => $_POST["deLogradouro"],
				'deComplemento' => $_POST["deComplemento"],
				'deSetor' => $_POST["deSetor"],
				'nmCidade' => $_POST["nmCidade"],
				'sgEstado' => $_POST["sgEstado"],
				'nuTelefoneComercial' => $_POST["nuTelefoneComercial"],
				'nuTelefoneCelular' => $_POST["nuTelefoneCelular"],
				'nuCep' => str_replace(array('-'), '', $_POST["nuCep"])
			);

			$solicitanteSfeSession = get_instance()->session->solicitantesfe('solicitante_sfe_logado');
			if ($solicitanteSfeSession != null) {
				$resultado = $this->solicitantes_model->updateSolicitante($solicitanteSfeSession->idSolicitante, $dadosAtualizados);
				if ($resultado) {
					echo "Solicitante atualizado com sucesso!";
				} else {
					echo "Falha ao atualizar o solicitante.";
				}
				$this->index();
			}
		}
	}
}
