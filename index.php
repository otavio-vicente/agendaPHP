<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de compromissos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/alertas.css">
</head>
<body>
<div id="alertas">
    <?php if(isset($_GET['retorno'])==true && $_GET['retorno']==1){ ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <span>Usuário ou senha inválidos!</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php } ?>
</div>

<section class="vh-100" style="background-color: #F2D7D2;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="https://planosperfeitos.com/wp-content/uploads/2021/07/05-04-21-1024x1024.jpeg" 
                alt="Compromissos" class="imgLogin" width="300px" height="500px" style="border-radius: 1rem;">
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
              <h6 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Efetue o login para acessar o sistema de agendamento</h6>
                
                <form action="php/autenticacao.php" method="POST">                 

                  <div class="form-outline mb-4">
                    <label class="form-label" >E-mail</label>
                    <input type="email" name="email" class="form-control form-control-lg">                   
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" >Senha</label>
                    <input type="password" name="senha" class="form-control form-control-lg">
                    
                  </div>

                  <div class="pt-1 mb-4">
                    <button  type="submit" class="btn btn-success">Entrar</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>