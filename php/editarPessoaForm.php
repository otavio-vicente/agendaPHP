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
	<link rel="stylesheet" href="../css/pessoasForm.css">	
</head>
<body>

    <?php include("menuSecretaria.php"); ?>    

    <h3 class="titulos">Edição de pessoas</h3>     
	<?php
		require_once("conexaoBanco.php");

		$idPessoa=$_POST['idPessoa'];
		$comando="SELECT * FROM pessoas WHERE idPessoa=".$idPessoa;
		$resultado=mysqli_query($conexao,$comando);
		$p=mysqli_fetch_assoc($resultado);


	?> 
	<form action="editarPessoa.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="idPessoa" value="<?=$p['idPessoa']?>">
		<div class="form-group">
		  <label class="control-label">Nome *</label>  
		<div class="col-md-8">
		 <input type="text" value="<?=$p['nome']?>" name="nome" accept="image/*" class="form-control" >
		</div>
		</div>
		
		 <div class="form-group">
		  <label class="control-label">Sobrenome *</label>  
		<div class="col-md-8">
		 <input type="text" value="<?=$p['sobrenome']?>" name="sobrenome" class="form-control" >
		</div>
		</div>
		
		<div class="form-group">
		  <label class="control-label">E-mail *</label>  
		<div class="col-md-8">
		 <input type="text" value="<?=$p['email']?>" name="email" class="form-control" >
		</div>
		</div>
		
		<div class="form-group">
		  <label class="control-label">Foto *</label>  
		<div class="col-md-8">
		 <input type="file" name="foto" class="form-control" >
		</div>
		</div>

		<div class="form-group">
		  <label class="control-label">Relação *</label>  
		<div class="col-md-8">
		 <select name="idRelacao" class="form-control">
		 	<?php
			  require_once("conexaoBanco.php");
			  $comando="SELECT * FROM relacoes";
			  $resultado=mysqli_query($conexao,$comando);
			  $relacoesRetornadas=array();
			  while($r  = mysqli_fetch_assoc($resultado)){
				  array_push($relacoesRetornadas, $r);
			  }
			  foreach($relacoesRetornadas as  $r){
				  if($p['relacoes_idRelacao']==$r['idRelacao']){
					echo "<option selected value='".$r['idRelacao']."'>".$r['descricao']."</option>";
				  }else{
					  echo "<option value='".$r['idRelacao']."'>".$r['descricao']."</option>";
				  }
			  }
			 ?>
		 </select>
		</div>
		</div>
		
		<div class="form-group">
		<label class="control-label"></label>
		<div class="col-md-8">
			<a href="pessoaForm.php"><button  class="btn btn-danger" type="button">Cancelar</button></a>
			<button  class="btn btn-success" type="submit">Cadastrar</button>			
		</div>
		</div>		
	</form>
</body>

	