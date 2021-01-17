<?php
require 'vendor/autoload.php';
require 'conexao.php';
require 'dao/ModalidadeDaoMysql.php';
require 'header.php';



$modalidadeDAO = new ModalidadeDaoMysql($pdo);
$lista = $modalidadeDAO->findAll();


?>


<div >
<table>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>

        <?php foreach($lista as $modal): ?>
            <tr>
              
                <td><?= $modal->getNome();?></td>
                <td>
                    <a class="btn-primary" href="editar.php?id=<?=$modal->getId();?>"><i class="far fa-edit"></i>  Editar</a>
                    <a class="btn-danger" href="excluir.php?id=<?=$modal->getId();?>" onclick ="return confirm('Tem certeza que deseja excluir?')"><i class="far fa-trash-alt"></i>  Excluir</a>
                </td>
            </tr>

        <?php endforeach; ?> 

</table>

<?php require 'footer.php'; ?>

