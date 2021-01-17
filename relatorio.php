<?php

require 'vendor/autoload.php';
require 'conexao.php';
require 'dao/AlunoDaoMysql.php';

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
<html>
<head>

</head>
<body>



<h3 style="color: #2f323A; text-align:center; text-transform: uppercase;">Célia <span style="color: #ff7a00;">Fitness</span></h3>
<h4 style="text-align:center;">Av.Principal do Guajara I we 73-A <br> Coqueiro, Ananindeua-PA</h4>

<h3 style="text-align:center;">Ficha de Inscrição</h3>

<div style="font-size: 17px; margin-left: 9px">
Nome:  <?=$aluno->getNome();?> <br>
Email:  <?=$aluno->getEmail();?>  <br>
Telefone:  <?=$aluno->getTelefone();?> <br>
RG: <br>
Tel. Emergencial: <?=$aluno->getTelefone();?> <br>
Modalidade: <br>
Data de Inicio: <?=  date('d/m/Y',strtotime($aluno->getDatainicio())); ?>
</div>


<h3 style="text-align:center;">Normas Internas</h3>

<ol>
<li>SUA MENSALIDADE DÁ DIREITO APENAS UM TURNO: MANHÃ, TARDE OU NOITE.</li>
<li>NÃO DEVOLVEMOS OU TRANSFERIMOS SEU PAGAMENTO, CASO NÃO FREQUENTE AS AULAS OU VENHA DESISTIR.</li>
<li>EM QUALQUER DÚVIDA DOS EXERCÍCIOS, DIRIJA-SE AO PROFESSOR E NUNCA A UM ALUNO.</li>
<li>LIBERE O EQUIPAMENTO ENTRE OS INTERVALOS DE DESCANSO PARA QUE OUTRA PESSOA POSSA ULTILIZÁ-LO. NÃO DESCANSE NO EQUIPAMENTO</li>
<li>NÃO É PERMITIDO RECEBER VISITAS NO SALÃO, ULTILIZE A ÁREA DE RECEPÇÃO PARA OS VISITANTES.</li>
<li>NÃO É PERMITIDA A PRESENÇA DE CRIANÇAS NO SALÃO DE MUSCULAÇÃO.</li>
<li>A DURAÇÃO DOS ALUNOS NAS AULAS É CONFORME A ORIENTAÇÃO DO INSTRUTOR.</li>
<li>O ALUNO OU O ESQUENTA QUE POR QUALQUER EVENTUALIDADE QUEBRAR OU DANIFICAR OS MATERIAS OU APARELHOS DA ACADEMIA, SERÁ AUTOMATICAMENTE RESPONSABILIZADO EM RESTITUIR O MESMO.</li>
<li>FICA ESTABELECIDO QUE O ALUNO SEJA RESPONSÁVEL PELA COLOCAÇÃO E RETIRADA DOS PESOS E ANILHAS NOS APARELHOS.</li>
<li>AVALIAÇÃO É IMPORTANTE NO ATO DA ESCRIÇÃO.</li>
<li>O ALUNO COM DOENÇAS PRÉ EXISTENTES PRECISA TRAZER UM LAUDO DO MÉDICO LIBERANDO-O PARA A PRÁTICA DE EXERCICIO FÍSICO</li>
<li>O ALUNO QUE RECUSAR A FAZER A AVALIAÇÃO TERÁ QUE ASSINAR UM TERMO DE RESPONSABILIDADE.</li>
</ol>



<p style="text-align:center; margin-top: 175px">
________________________________ <br>
Assinatura do(a) Aluno(a).
</p>



</body>
</html>