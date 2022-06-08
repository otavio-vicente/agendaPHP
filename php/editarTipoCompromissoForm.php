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
    <?php include("menuSecretaria.php"); ?>    

    <?php
        require_once("conexaoBanco.php");
        $idTipo=$_POST['idTipo'];

        $comando="SELECT * FROM tiposcompromissos WHERE idTipo=".$idTipo;
        $resultado=mysqli_query($conexao,$comando);
        $t=mysqli_fetch_assoc($resultado);
    ?>

    <h3 class="titulos">Edição de tipo de compromisso</h3>  

	<form action="editarTipoCompromisso.php" method="POST">

        <input type="hidden" value="<?=$t['idTipo']?>" name="idTipo">
		<div class="form-group">
		  <label class="control-label">Descrição do compromisso *</label>  
		<div class="col-md-8">
		 <input type="text" value="<?=$t['descricao']?>" name="descricao" class="form-control" >
		</div>
		</div>
		
		<div class="form-group">
		<label class="control-label"></label>
		<div class="col-md-8">
		<a href="tipoCompromissoForm.php"><button  class="btn btn-danger" type="button">Cancelar</button></a>
			<button  class="btn btn-success" type="submit">Cadastrar</button>			
		</div>
		</div>

       
	</form>
    </body>

    