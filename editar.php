<?php

require 'conexao.php';
require 'dao/AlunoDaoMysql.php';
require 'header.php';

$alunoDAO = new AlunoDaoMysql($pdo);


$aluno = false;

$id = filter_input(INPUT_GET,'id'); 
if($id){
    $aluno = $alunoDAO->findById($id);

}

if ($aluno === false) {
    header("Location:listarAluno.php");
    exit;
}



?>



<div class="container">

    <h1>Atualizar Aluno</h1>


        <form method="POST" action="editar_action.php">
            <input type="hidden" name="id" value="<?=$aluno->getId();?>">
            <label>
                Nome:
                <input type="text" name="nome" value="<?=$aluno->getNome();?>"/>
            </label> <br>
            <label >
                Email:
                <input type="email" name="email" value="<?=$aluno->getEmail();?>"/>
            </label> <br>
            <label >
                Telefone:
                <input type="text" name="telefone" value="<?=$aluno->getTelefone();?>"/>
            </label> <br>
            <label>
                Data de Nascimento:
                <input type="date" name="datanascimento" value="<?=$aluno->getDatanascimento();?>"/>
            </label><br>
            <label >
                Modalidade: 
                <select name="modalidade" value="<?=$aluno->getModalidade();?>">
                    <option value="1">Musculação</option>
                    <option value="2">Muay Thai</option>
                </select>
            </label><br>
            <label >
                Data de Inicio: 
                <input type="date" name="datainicio" value="<?=$aluno->getDatainicio();?>"/>
            </label><br>
            <label >
                Valor:
                <input type="number" name="mensalidade" value="<?=$aluno->getMensalidade();?>"/>
            </label><br>
            <input type="submit" value="Cadastrar Aluno">
        </form>
</div>

<?php require 'footer.php';?>