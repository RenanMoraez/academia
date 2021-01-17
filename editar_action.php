<?php
require 'conexao.php';
require 'dao/AlunoDaoMysql.php';

$alunoDAO = new AlunoDaoMysql($pdo);

$id = filter_input(INPUT_POST,'id');
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone');
$datanascimento = filter_input(INPUT_POST, 'datanascimento');
$modalidade = filter_input(INPUT_POST, 'modalidade');
$datainicio = filter_input(INPUT_POST, 'datainicio');
$mensalidade = filter_input(INPUT_POST, 'mensalidade');


if ($id && $nome && $email && $telefone && $datanascimento && $modalidade && $datainicio && $mensalidade) {

    $aluno = new Aluno();
    $aluno->setId($id);
    $aluno->setNome($nome);
    $aluno->setEmail($email);
    $aluno->setTelefone($telefone);
    $aluno->setDatanascimento($datanascimento);
    $aluno->setModalidade($modalidade);
    $aluno->setDatainicio($datainicio);
    $aluno->setMensalidade($mensalidade);

    
    $alunoDAO->update($aluno);

    header("Location: listarAluno.php");
    exit;
   
}else{
    header("Location: editar.php?=".$id);
    exit;
}