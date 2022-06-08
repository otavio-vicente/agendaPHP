<?php

require_once("conexaoBanco.php");

$idRelacao=$_POST['idRelacao'];

$verPessoas="SELECT idPessoa FROM pessoas WHERE relacoes_idRelacao=".$idRelacao;
// echo $verPessoas;
$resultadoPessoas = mysqli_query($conexao,$verPessoas);
$linhas=mysqli_num_rows($resultadoPessoas);

if($linhas==0){
    $comando="DELETE FROM relacoes WHERE idRelacao=".$idRelacao;
    $resultado=mysqli_query($conexao,$comando);
    if($resultado==true){
        header("Location: relacaoForm.php?retorno=2");
    }
}else{
    header("Location: relacaoForm.php?retorno=3");
}

?>