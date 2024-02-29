<?php

require_once("../model/Contato.php");
require_once("ContatoService.php");



class ContatoServiceImpl implements ContatoService
{

    public function create(Contato $contato)
    {
        echo ($contato->getName());
    }

    public function findAll()
    {
    }
}