<?php
require 'vendor/autoload.php';
require 'conexao.php';
require 'dao/AlunoDaoMysql.php';
require 'header.php';



$alunoDAO = new AlunoDaoMysql($pdo);
$lista = $alunoDAO->vencimento();

print_r($lista);
?>


