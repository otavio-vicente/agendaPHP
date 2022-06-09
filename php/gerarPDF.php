<?php

require_once ("../vendor/autoload.php");
require_once("conexaoBanco.php");

$idCompromisso=$_POST['idComp'];
$comando="SELECT * FROM compromissos WHERE idCompromisso=".$idCompromisso;
$resultado=mysqli_query($conexao,$comando);
$comp=mysqli_fetch_assoc($resultado);

$mpdf = new \Mpdf\Mpdf();

$mpdf->WriteHTML('
<style>

body {
    background-color: #121212;
}

h2, h3, p{
    font-family: Arial;
    color: #FFFFFF;
}


</style>
');

$mpdf->WriteHTML('<h2> Informações do compromisso </h2>');
$mpdf->WriteHTML('<hr>');


$mpdf->WriteHTML('<h3> Dados gerais </h3>');
$mpdf->WriteHTML('<p>Descrição: '.$comp['descricao'].'</p>');
$mpdf->WriteHTML('<p>Data Início: '.$comp['dataInicio'].'</p>');
$mpdf->WriteHTML('<p>Hora: '.$comp['hora'].'</p>');
$mpdf->WriteHTML('<p>Data Finalização: '.$comp['dataFim'].'</p> <br>');


$mpdf->WriteHTML('<h3>Localização</h3>');
$mpdf->WriteHTML('<p>Local: '.$comp['local'].'</p>');
$mpdf->WriteHTML('<p>Rua: '.$comp['rua'].'</p>');
$mpdf->WriteHTML('<p>Número: '.$comp['numero'].'</p>');
$mpdf->WriteHTML('<p>Bairro: '.$comp['bairro'].'</p>');
$mpdf->WriteHTML('<p>Cidade: '.$comp['cidade'].'</p><br>');

$mpdf->WriteHTML('<h3>Pessoas</h3>');

$comando="SELECT p.nome, p.sobrenome FROM pessoas p INNER JOIN
compromissos_pessoas cp ON p.idPessoa=cp.pessoas_idPessoa WHERE
compromissos_idCompromisso=".$idCompromisso;

$resultado=mysqli_query($conexao,$comando);
$pessoas=array();

while($p = mysqli_fetch_assoc($resultado)){
    array_push($pessoas, $p);
}

foreach($pessoas as $p){
    $mpdf->WriteHTML("<p>".$p['nome']." ".$p['sobrenome']."</p>");
}

$mpdf->Output();


?>