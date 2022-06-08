<?php
require_once("conexaoBanco.php");

$descricao=$_POST['descricao'];
$idTipo=$_POST['idTipo'];
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

$idCompromisso=$_POST['idComp'];

$idPessoas=array();
$idPessoas=$_POST['idPessoa'];

$comandoEdicaoCompromisso="UPDATE compromissos SET 
dataInicio='".$dataInicio."',
dataFim='".$dataFim."',
hora='".$hora."',
descricao='".$descricao."',
local='".$local."',
rua='".$rua."',
bairro='".$bairro."',
cidade='".$cidade."',
estado='".$estado."',
cep='".$cep."',
numero='".$numero."',
observacao='".$obs."',
tiposCompromissos_idTipo=".$idTipo." WHERE idCompromisso=".$idCompromisso;

$resultado=mysqli_query($conexao,$comandoEdicaoCompromisso);

/**Retira todas as pessoas do compromisso e recadastra as pessoas do compromisso. É necessário fazer isso porque não temos 
 * como saber quantas pessoas foram excluídas ou quantas novas fora adicionadas*/

$comandoExclusaoPessoasDoCompromisso="DELETE FROM compromissos_pessoas WHERE compromissos_idCompromisso=".$idCompromisso;
$resultado=mysqli_query($conexao, $comandoExclusaoPessoasDoCompromisso);

for($i=0; $i<sizeof($idPessoas); $i++){
    if($idPessoas[$i] != 0){
        $comando="INSERT INTO compromissos_pessoas (compromissos_idCompromisso, pessoas_idPessoa) 
        VALUES (".$idCompromisso.", ".$idPessoas[$i].")";
        $resultado=mysqli_query($conexao, $comando);
    }    
}

if($resultado==true){
    header("Location: agendarCompromissoForm.php?retorno=2");
}else{
    header("Location: agendarCompromissoForm.php?retorno=3");
}





?>