<?php
require 'vendor/autoload.php';
require 'conexao.php';
require 'dao/AlunoDaoMysql.php';
require 'header.php';



$alunoDAO = new AlunoDaoMysql($pdo);
$lista = $alunoDAO->findAll();


?>


<div >
        <table>

        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Data de Nascimento</th>
            <th>Modalidade</th>
            <th>Data de Inicio</th>
            <th>Valor da Mensalidade</th>
            <th>Ações</th>
        </tr>

        <?php foreach($lista as $aluno): ?>
            <tr>
              
                <td><?= $aluno->getNome();?></td>
                <td><?= $aluno->getEmail();?></td>
                <td><?= $aluno->getTelefone();?></td>
                <td><?= date('d/m/Y',strtotime($aluno->getDatanascimento()));?></td>
                <td><?= $aluno->getModalidade();?></td>
                <td><?= date('d/m/Y',strtotime($aluno->getDatainicio()));?></td>
                <td><?= 'R$ '.$aluno->getMensalidade();?></td>
                <td>
                    <a class="btn-success" href="impresao.php?id=<?=$aluno->getId();?>"><i class="far fa-file-pdf"></i></a>
                    <a class="btn-primary" href="editar.php?id=<?=$aluno->getId();?>"><i class="far fa-edit"></i></a>
                    <a class="btn-danger" href="excluir.php?id=<?=$aluno->getId();?>" onclick ="return confirm('Tem certeza que deseja excluir?')"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>

        <?php endforeach; ?> 

</table>

<?php require 'footer.php'; ?>

