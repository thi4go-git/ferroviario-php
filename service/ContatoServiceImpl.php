<?php

require_once("../config/global.php");
require_once("../model/Contato.php");
require_once("ContatoService.php");
include_once("../conexao/Conexao.php");



class ContatoServiceImpl implements ContatoService
{
    private $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function create(Contato $contato)
    {

        $query = "INSERT INTO contacts (name, phone, observations) VALUES (:name, :phone, :observations)";

        $stmt = $this->conn->prepare($query);

        try {
            // Executar a inserção dos dados
            $stmt->execute(
                array(
                    ':name' => $contato->getName(),
                    ':phone' => $contato->getPhone(),
                    ':observations' => $contato->getObservations()
                )
            );


            $_SESSION["msg"] = "Contato salvo com sucesso: " . $contato->getName();
            header("Location: http://localhost/ferroviario-php/");// redirecionar após salvar

        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo "Erro: $error";
        }
    }

    public function findAll()
    {
    }
}