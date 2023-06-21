<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] === 'ok') {
    // O usuário já está logado, redireciona para a página protegida
    header("Location: home-page.php?login=ok&usuario='$usuario_logado'");
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stellar Delivery 🌠🍰 | Área Restrita</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../../favicon.svg" type="image/svg">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h4 class="text-center">🤖 Área Restrita 👾</h4>
              </div>
              <div class="card-body">
                <form action="login.php" method="POST">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu email">
                  </div>
                  <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha">
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    

<script src="../../js/jquery3.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="../../js/bootstrap.bundle.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $(document).ready(function(){
    function avisos() {
      let urlParams = new URLSearchParams(window.location.search)
      let erro = urlParams.get('erro')

      if (erro === 'conta-nao-encontrada'){
        Swal.fire({
          title: "Erro!",
          icon: "error",
          text: "Esta conta não foi encontrada. Talvez você tenha digitado um email ou senha errados?"
        })
      }
    }

    avisos()
  })
</script>
</body>
</html>