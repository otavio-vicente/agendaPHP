<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de compromissos - Secretária</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/formularios.css">
	<link rel="stylesheet" href="../css/alertas.css">

</head>
<body>

	<?php include("menuSecretaria.php");
	
	require_once("conexaoBanco.php");
	$idRelacao=$_POST['idRelacao'];
	$comando="SELECT * FROM relacoes WHERE idRelacao=".$idRelacao;
	$resultado=mysqli_query($conexao,$comando);
	$r=mysqli_fetch_assoc($resultado);

	
	?>
	
    <h3 class="titulos">Edição de relação</h3>  

	<form action="editarRelacao.php" method="POST">
        <input type="hidden" name="idRelacao" value="<?=$r['idRelacao']?>">

		<div class="form-group">
		  <label class="control-label">Descrição da relação *</label>  
		<div class="col-md-4">
		 <input type="text" value="<?=$r['descricao']?>" name="descricao" class="form-control" >
		</div>
		</div>
		
		<div class="form-group">
		<label class="control-label"></label>
		<div class="col-md-8">
        <a href="relacaoForm.php"><button  class="btn btn-danger" type="button">Cancelar</button></a>
			<button  class="btn btn-success" type="submit">Cadastrar</button>			
		</div>
		</div>		
	</form>
</body>
</html>

  