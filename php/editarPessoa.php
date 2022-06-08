<?php
require_once("conexaoBanco.php");
$idPessoa=$_POST['idPessoa'];

$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$email=$_POST['email'];
$foto=$_FILES['foto']['name'];
$idRelacao=$_POST['idRelacao'];
$comandoEdicao="";

if($foto!=""){
    //veio uma foto nova
    $comando="SELECT foto from pessoas WHERE idPessoa=".$idPessoa;
    $resultado=mysqli_query($conexao,$comando);
    $fotoAntiga=mysqli_fetch_assoc($resultado);
    if($fotoAntiga['foto']!=""){
        unlink("../fotos/".$fotoAntiga['foto']);
    }

    $extesao=strtolower(substr($foto,-4));
    $novoNomeFoto=date("Y.m.d-H.i.s").$extesao;
    $pasta="../fotos/";
    move_uploaded_file($_FILES['foto']['tmp_name'],$pasta.$novoNomeFoto);

    $comandoEdicao="UPDATE pessoas SET nome='".$nome."', sobrenome='".$sobrenome."',email='".$email."', foto='".$novoNomeFoto."', relacoes_idRelacao=".$idRelacao." WHERE idPessoa=".$idPessoa;



}else{
    //o usuario não editou a foto
    $comandoEdicao="UPDATE pessoas SET nome='".$nome."', sobrenome='".$sobrenome."',email='".$email."', relacoes_idRelacao=".$idRelacao." WHERE idPessoa=".$idPessoa;
}

$resultadoEdicao=mysqli_query($conexao,$comandoEdicao);

if($resultadoEdicao==true){
    header("Location: pessoaForm.php?retorno=4");
}else{
    header("Location: pessoaForm.php?retorno=5");
}

?>