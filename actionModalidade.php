<?php
require 'conexao.php';
require 'dao/ModalidadeDaoMysql.php';

$modalidadeDAO = new ModalidadeDaoMysql($pdo);

$nome = filter_input(INPUT_POST, 'nome');


if ($nome) {

    if ($modalidadeDAO->findByNome($nome) === false) {
        $novaModalidade = new Modalidade();
        $novaModalidade->setNome($nome);
        $modalidadeDAO->add($novaModalidade);

        header("Location: listarModalidade.php");
        exit;
    }else {
        header("Location: addModalidade.php");
    }
}else{
    header("Location: addModalidade.php");
    exit;
}