<?php
    require_once("conexaoBanco.php");

    $idCompromisso=$_POST['idComp'];

    $comandoPessoas="DELETE FROM compromissos_pessoas WHERE
    compromissos_idCompromisso=".$idCompromisso;
    
    $comandoCompromisso="DELETE FROM compromissos WHERE
    idCompromisso=".$idCompromisso;

    $resultadoPessoas=mysqli_query($conexao,$comandoPessoas);
    $resultadoCompromisso=mysqli_query($conexao,$comandoCompromisso);

    if($resultadoCompromisso==true){
        header("Location: agendarCompromissoForm.php?retorno=4");
    }

    

?>