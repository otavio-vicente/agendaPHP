<?php

require_once("conexaoBanco.php");

$email=$_POST['email'];
$senha=$_POST['senha'];

//função md5() criptografa a senha no algoritimo MD5
$senhaMD5=md5($senha);

$comando="SELECT * FROM usuarios WHERE email='".$email."' AND senha='".$senhaMD5."' ";

$resultado=mysqli_query($conexao,$comando);

$linhas=mysqli_num_rows($resultado);

if($linhas==0){
    header("Location: ../index.php?retorno=1");
}else{
    $usuario=mysqli_fetch_assoc($resultado);
    session_start();
    $_SESSION['nivel']=$usuario['nivel'];
    
    if($usuario['nivel']=='1'){
        header("Location: principalSecretaria.php");
    }else{
        header("Location: principalExecutivo.php");
    }
}

?>