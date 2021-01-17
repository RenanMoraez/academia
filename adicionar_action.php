<?php
require 'conexao.php';
require 'dao/AlunoDaoMysql.php';

$alunoDAO = new AlunoDaoMysql($pdo);

$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone');
$datanascimento = filter_input(INPUT_POST, 'datanascimento');
$modalidade = filter_input(INPUT_POST, 'modalidade');
$datainicio = filter_input(INPUT_POST, 'datainicio');
$mensalidade = filter_input(INPUT_POST, 'mensalidade');


if ($nome && $email && $telefone && $datanascimento && $modalidade && $datainicio && $mensalidade) {

    if ($alunoDAO->findByEmail($email) === false) {
        $novoAluno = new Aluno();
        $novoAluno->setNome($nome);
        $novoAluno->setEmail($email);
        $novoAluno->setTelefone($telefone);
        $novoAluno->setDatanascimento($datanascimento);
        $novoAluno->setModalidade($modalidade);
        $novoAluno->setDatainicio($datainicio);
        $novoAluno->setMensalidade($mensalidade); 


        $alunoDAO->add($novoAluno);

        header("Location: listarAluno.php");
        exit;
    }else {
        header("Location: addAluno.php");
    }
}else{
    header("Location: addAluno.php");
    exit;
}