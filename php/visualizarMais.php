<?php
	session_start();

	if(isset($_SESSION['nivel']) && $_SESSION['nivel']=="1"){
		

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de compromissos - Secretária</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    
<?php include("menuSecretaria.php"); ?>    

<?php
    require_once("conexaoBanco.php");
    $idCompromisso=$_POST['idComp'];

    $comando="SELECT p.nome, p.sobrenome FROM pessoas p INNER JOIN
    compromissos_pessoas cp ON p.idPessoa=cp.pessoas_idPessoa WHERE
    compromissos_idCompromisso=".$idCompromisso;

    $resultado=mysqli_query($conexao,$comando);

    $pessoas=array();

    while($p = mysqli_fetch_assoc($resultado)){
        array_push($pessoas, $p);
    }
    echo "<h3>Pessoas do compromisso</h3>";
    foreach($pessoas as $p){
        echo "<p>".$p['nome']." ".$p['sobrenome']."</p>";
    }


?>

</body>
</html>

<?php
	}else{
		header("Location: alertaEfetuarLogin.html");
	}

?>