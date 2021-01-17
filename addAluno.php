<?php
require 'vendor/autoload.php';
require 'header.php';
require 'conexao.php';
require 'dao/ModalidadeDaoMysql.php';

$modaliadeDao = new ModalidadeDaoMysql($pdo);
$lista = $modaliadeDao->findAll();


?>


<div class="formulario">
    <form method="POST" action="adicionar_action.php">
        <label>
            Nome:
            <input class="form-control" type="text" name="nome" placeholder="Nome Completo"/>
        </label> <br>
        <label >
            Email:
            <input class="form-control" type="email" name="email" placeholder="exemplo@exemplo.com"/>
        </label> <br>
        <label >
            Telefone:
            <input class="form-control" type="text" name="telefone" placeholder="91 00000-0000"/>
        </label> <br>
        <label>
            Data de Nascimento:
            <input class="form-control" type="date" name="datanascimento" placeholder="00/00/0000"/>
        </label><br>
        <label >
            Modalidade: 
            <select name="modalidade">
                <?php foreach( $lista as $modalidade ):?> 
                     <option value="<?= $modalidade->getId(); ?>"> <?= $modalidade->getNome(); ?></option>
               <?php endforeach; ?>
            </select>
        </label><br>
        <label >
            Data de Inicio: 
            <input class="form-control" type="date" name="datainicio" placeholder="00/00/0000"/>
        </label><br>
        <label >
            Valor:
            <input type="text" name="mensalidade" class="form-control"/>
        </label><br>
        <input class="btn-form" type="submit" value="Cadastrar Aluno" placeholder="apenas numeros">
    </form>
</div>
<?php require 'footer.php'; ?>