<?php
require_once("conexaoBanco.php");

$descricao=$_POST['descricao'];
$tipoCompromisso=$_POST['idTipo'];
$dataInicio=$_POST['dataInicio'];
$dataFim=$_POST['dataFim'];
$hora=$_POST['hora'];
$local=$_POST['local'];
$cep=$_POST['cep'];
$numero=$_POST['numero'];
$rua=$_POST['rua'];
$bairro=$_POST['bairro'];
$cidade=$_POST['cidade'];
$estado=$_POST['estado'];
$obs=$_POST['obs'];

$idPessoas=array();
$idPessoas=$_POST['idPessoa'];
/*
echo "ID das pessoas que foram selecionadas para o compromisso";
for($i=0; $i < sizeof($idPessoas); $i++){
    echo $idPessoas[$i]."<br>";
}
*/

$comando="INSERT INTO compromissos
(dataInicio,dataFim,hora,descricao,local,rua,bairro,cidade,estado,cep,numero,observacao,tiposcompromissos_idTipo) 
VALUES
('".$dataInicio."',
'".$dataFim."',
'".$hora."',
'".$descricao."',
'".$local."',
'".$rua."',
'".$bairro."',
'".$cidade."',
'".$estado."',
'".$cep."',
".$numero.",
'".$obs."',
".$tipoCompromisso.")";

// echo $comando;

$resultado=mysqli_query($conexao,$comando);
//consultando no banco o id do compromisso que foi registrado...
$compRegistrado="SELECT MAX(idCompromisso) as idCompromisso FROM compromissos";
$resultadoIdComp=mysqli_query($conexao,$compRegistrado);
$idCompromisso=mysqli_fetch_assoc($resultadoIdComp);

for($i=0; $i < sizeof($idPessoas); $i++){
    $comando="INSERT INTO compromissos_pessoas 
    (compromissos_idCompromisso,pessoas_idPessoa) 
    VALUES 
    (".$idCompromisso['idCompromisso'].",".$idPessoas[$i].")";

    // echo $comando."<br>";
    $resultado=mysqli_query($conexao,$comando);
}
if($resultado==true){
    header("Location: agendarCompromissoForm.php?retorno=1");
}else{
    header("Location: agendarCompromissoForm.php?retorno=0");
}
?>