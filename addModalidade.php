<?php

require 'header.php';
require 'vendor/autoload.php';

?>


<div class="formulario">
    <form method="POST" action="actionModalidade.php">
        <label>
            Nome:
            <input class="form-control" type="text" name="nome" placeholder="Nome da Modalidade"/>
        </label> <br>
        <input class="btn-form" type="submit" value="Adicionar">
    </form>
</div>
<?php require 'footer.php'; ?>