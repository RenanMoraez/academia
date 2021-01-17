<?php

require 'conexao.php';
require 'dao/AlunoDaoMysql.php';


$alunoDao = new AlunoDaoMysql($pdo);


$id = filter_input(INPUT_GET,'id');

if($id){

    $alunoDao->delete($id);

}
    header("Location: listarAluno.php");
    exit;


?>