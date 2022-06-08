<?php

require_once("conexaoBanco.php");

$idTipo=$_POST['idTipo'];

$verificarCompromissos="SELECT * FROM compromissos WHERE tiposcompromissos_idTipo=".$idTipo;

$resultadoVerificar=mysqli_query($conexao,$verificarCompromissos);

$linhasCompromissos=mysqli_num_rows($resultadoVerificar);

if($linhasCompromissos==0){
    $comandoExclusao="DELETE FROM tiposcompromissos WHERE idTipo=".$idTipo;
    $resultado=mysqli_query($conexao, $comandoExclusao);
    header("Location: tipoCompromissoForm.php?retorno=2");
}else{
    header("Location: tipoCompromissoForm.php?retorno=3");
}




?>