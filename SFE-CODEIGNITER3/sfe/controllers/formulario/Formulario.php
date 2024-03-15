<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Formulario extends CI_Controller
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
            'sfe/formulario/formulario',
            $this->dados
        );
    }

    public function enviar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            print_r($_POST); // ou var_dump($_POST);          
        }
    }

    public function usuario()
    {
        $this->blade->render(
            'sfe/formulario/formulario',
            $this->dados
        );
    }
}
