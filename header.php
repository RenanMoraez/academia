<?php require 'vendor/autoload.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;900&display=swap" rel="stylesheet">
    <title>Célia Fitness</title>
</head>
<body>
    <input type="checkbox" id="check">
    <header>

    <label for="check">
    <i class="fas fa-bars" id="sidebar_btn"></i>
    </label>

    <div class="left_area">
        <h3>Célia <span>Fitness</span></h3>
    </div>
    <div class="right_area">
        <a href="#" class="logout_btn">Sair</a>
    </div>
    </header>

<!-- painel lateral -->
<div class="sidebar">
<center>
<img src="assets/img/logo.jpg" class="perfil_imagem" alt="">
<h4>Administrador</h4>
</center>
<a href="index.php"><i class="fas fa-home"></i><span>Inicio</span></a>
<a href="addAluno.php"><i class="fas fa-user-plus"></i><span>Adicionar Aluno</span></a>
<a href="listarAluno.php"><i class="fas fa-table"></i><span>Listar Alunos</span></a>
<a href="addModalidade.php"><i class="fas fa-info-circle"></i><span>Adicionar Modalidade</span></a>
<a href="listarModalidade.php"><i class="fas fa-info-circle"></i><span>Listar Modalidade</span></a>
<a href=""><i class="fas fa-money-check-alt"></i><span>Mensalidades</span></a>
<a href="#"><i class="fas fa-file-invoice"></i><span>Documentos</span></a>
</div>
<!-- painel fim -->
<div class="content">

