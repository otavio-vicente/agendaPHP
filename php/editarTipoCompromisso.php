<?php

require_once("conexaoBanco.php");

$idTipo=$_POST['idTipo'];
$descricao=$_POST['descricao'];

$comando="UPDATE tiposcompromissos SET descricao='".$descricao."' WHERE idTipo=".$idTipo;

$resultado=mysqli_query($conexao, $comando);

if($resultado==true){
    header("Location: tipoCompromissoForm.php?retorno=4");
}else{
    header("Location: tipoCompromissoForm.php?retorno=5");
}




?>