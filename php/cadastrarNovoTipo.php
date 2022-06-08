<?php

require_once("conexaoBanco.php");

$descricao=$_POST['descricao'];

$comando="INSERT INTO tiposcompromissos (descricao) VALUES ('".$descricao."')";

echo $comando;

$resultado=mysqli_query($conexao, $comando);

if($resultado==true){
    header("Location: tipoCompromissoForm.php?retorno=1");
}else{
    header("Location: tipoCompromissoForm.php?retorno=0");
}



?>