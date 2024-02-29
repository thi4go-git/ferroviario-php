<?php

session_start();

require_once("../model/Contato.php");
require_once("ContatoService.php");
include_once("../conexao/Conexao.php");



class ContatoServiceImpl implements ContatoService
{

    public function create(Contato $contato, $conn)
    {
        echo ($contato->getName());

        $query = "INSERT INTO contacts (name, phone, observations) VALUES (:name, :phone, :observations)";

        $stmt = $conn->prepare($query);

        try {
            // Executar a inserção dos dados
            $stmt->execute(
                array(
                    ':name' => $contato->getName(),
                    ':phone' => $contato->getPhone(),
                    ':observations' => $contato->getObservations()
                )
            );
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo "Erro: $error";
        }
    }

    public function findAll()
    {
    }
}