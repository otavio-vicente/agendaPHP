<?php
require_once("conexaoBanco.php");


$idPessoa=$_POST['idPessoa'];

$verCompromisso="SELECT * FROM compromissos_pessoas WHERE pessoas_idPessoa=".$idPessoa;

$resultadoComp = mysqli_query($conexao,$verCompromisso);
$linhas=mysqli_num_rows($resultadoComp);

if($linhas==0){
    //a pessoa pode ser excluída
    $comandoFoto="SELECT foto FROM pessoas WHERE idPessoa=".$idPessoa;
    $resultadoFoto=mysqli_query($conexao,$comandoFoto);
    $foto=mysqli_fetch_assoc($resultadoFoto);
    if($foto['foto']!=""){ //se a pessoa tem foto
        unlink("../fotos".$foto['foto']);
    }
    $comandoExclusao="DELETE FROM pessoas WHERE idPessoa=".$idPessoa;
    $resultadoExclusao=mysqli_query($conexao,$comandoExclusao);

    if($resultadoExclusao){
        header("Location: pessoaForm.php?retorno=2");
    }
}else{
    //a pessoa não pode ser excluída
    header("Location: pessoaForm.php?retorno=3");
}





?>