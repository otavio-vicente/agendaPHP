<?php
require_once("conexaoBanco.php");

$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$email=$_POST['email'];
$foto=$_FILES['foto']['name'];
$idRelacao=$_POST['idRelacao'];

$extesao=strtolower(substr($foto,-4));
//echo "Extensão do arquivo: ".$extesao;

$novoNomeFoto=date("Y.m.d-H.i.s").$extesao;
$pasta="../fotos        /";

move_uploaded_file($_FILES['foto']['tmp_name'],$pasta.$novoNomeFoto);
$comando ="INSERT INTO pessoas(nome,sobrenome,email,foto,relacoes_idRelacao)VALUES('".$nome."','".$sobrenome."','".$email."','".$novoNomeFoto."',".$idRelacao.")";

// echo $comando;
$resultado=mysqli_query($conexao,$comando);
if($resultado){
    header("Location: pessoaForm.php?retorno=1");
}else{
    header("Location: pessoaForm.php?retorno=0");
}

?>