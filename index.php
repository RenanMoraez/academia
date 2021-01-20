
<?php
require 'vendor/autoload.php';
require 'conexao.php';
require 'dao/AlunoDaoMysql.php';
require 'header.php';


$alunoDAO = new AlunoDaoMysql($pdo);
$lista = $alunoDAO->vencimento();


?>

<div class="cards">
    <div class="card_user">
        <h3><i class="fas fa-user"></i>   Alunos Cadastrados</h3> 
        <div class="desc">
      
        </div>
    </div>

    <div class="card_venc">
        <h3>Mensalidades Vencidas</h3>
            <div class="desc">

            </div>
    </div>

    <div class="card_money">
        <h3>Total do Mês</h3>
            <div class="desc">
            
            </div>
    </div>
</div>


<div class="table-client-venc" style="margin-top: 14px;">
        <table>     

            <tr>
                <th><i class="fas fa-user"></i> Alunos</th>
                <th><i class="far fa-calendar-alt"></i>  Proximos Vencimentos</th>
            </tr>

            <?php foreach($lista as $aluno): ?>
                <tr>              
                    <td><?= $aluno->getNome();?></td>
                    <td><?= date('d/m/Y',strtotime($aluno->getVencimento())); ?>  <span class="contador">  - 30 dias</span></td>
                </tr>

            <?php endforeach; ?> 

        </table>
</div>







<?php require 'footer.php'; ?>