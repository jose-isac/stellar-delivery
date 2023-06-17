<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Stellar Delivery 🌠🍰</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1>Stellar Delivery 🌠🍰</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 my-3">
        <input class="form-control" type="text" name="" placeholder="O que você deseja?" id="">
      </div>
      <div class="d-flex flex-row-reverse col-md-4 my-3">
        <button class="btn btn-outline-secondary" id="btnPerfil">Meu perfil</button>
        <button class="btn btn-outline-success mr-3" id="btnLogin">Login</button>
        <button class="btn btn-outline-primary mr-3" type="submit">Pesquisar</button>
      </div>
    </div>
  </div>
  
  <div class="container">
    <div class="row">
      <div class="col-md-4 my-3">
        <div class="card" id="1">
          <img src="https://via.placeholder.com/150" class="card-img-top" alt="Produto 1">
          <div class="card-body">
            <h5 class="card-title">Produto 1</h5>
            <p class="card-text">Descrição do Produto 1.</p>
            <a href="#" class="btn btn-primary">Adicionar ao Carrinho</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 my-3">
        <div class="card" id="2">
          <img src="https://via.placeholder.com/150" class="card-img-top" alt="Produto 2">
          <div class="card-body">
            <h5 class="card-title">Produto 2</h5>
            <p class="card-text">Descrição do Produto 2.</p>
            <a href="#" class="btn btn-primary">Adicionar ao Carrinho</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 my-3">
        <div class="card" id="3">
          <img src="https://via.placeholder.com/150" class="card-img-top" alt="Produto 3">
          <div class="card-body">
            <h5 class="card-title">Produto 3</h5>
            <p class="card-text">Descrição do Produto 3.</p>
            <a href="#" class="btn btn-primary">Adicionar ao Carrinho</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-md-4 my-4">
        <div class="card" id="4">
          <img src="https://via.placeholder.com/150" class="card-img-top" alt="Produto 4">
          <div class="card-body">
            <h5 class="card-title">Produto 4</h5>
            <p class="card-text">Descrição do Produto 4.</p>
            <a href="#" class="btn btn-primary">Adicionar ao Carrinho</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 my-4">
        <div class="card" id="5">
          <img src="https://via.placeholder.com/150" class="card-img-top" alt="Produto 5">
          <div class="card-body">
            <h5 class="card-title">Produto 5</h5>
            <p class="card-text">Descrição do Produto 5.</p>
            <a href="#" class="btn btn-primary">Adicionar ao Carrinho</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 my-4">
        <div class="card" id="6">
          <img src="https://via.placeholder.com/150" class="card-img-top" alt="Produto 6">
          <div class="card-body">
            <h5 class="card-title">Produto 6</h5>
            <p class="card-text">Descrição do Produto 6.</p>
            <a href="#" class="btn btn-primary">Adicionar ao Carrinho</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal Login-->
  
  <div class="modal fade" id="janelaLogin" tabindex="-1" aria-labelledby="titulo-login" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="titulo-login">Login</h3>
          <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">X</button>
        </div>
        <div class="modal-body">
          <div class="container">
            
            <form class="form" action="">
              <label class="form-label" for="usuario_email">E-Mail</label>
              <input class="form-control" type="email" placeholder="Digite seu e-mail" id="usuario_email">
              
              <label class="form-label" for="usuario_senha">Senha</label>
              <input class="form-control" type="password" required id="usuario_senha" placeholder="Digite sua senha">
              <hr>
              <p>
                <a href="registro.php" id="aRegistro">Ainda não tem uma conta?</a>
              </p>
              <p>
                 <a href="" id="aAdministrador">Sou administrador</a>
              </p>
              
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" value="Login" id="btnLogin">
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Fim do modal Login -->
  
  <!-- Modal Produto-->
  
  <div class="modal fade" id="modalProduto" tabindex="-1" aria-labelledby="produto_titulo" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h3 id="produto_titulo"></h3>
          <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">X</button>
        </div>
        <div class="modal-body" id="modal-corpo">
          <div class="container">
            <div class="row">
              <div class="col-md-4">
                <div class="thumbnail">
                  <img src="https://via.placeholder.com/150" class="card-img-top" alt="Produto 6">
                </div>
              </div>
              <div class="col-md-8">
                <p>Este alimento é assim assim assado.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="btn_comprar">Comprar</button>
        </div>
      </div>
    </div>
    
  </div>
  
  <!-- Fim do modal produto -->
  
    <!-- Modal Perfil-->
  
  <div class="modal fade" id="modalPerfil" tabindex="-1" aria-labelledby="perfil_titulo" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h3 id="perfil_titulo"></h3>
          <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">X</button>
        </div>
        <div class="modal-body" id="modal-corpo">
          <div class="container">
            <div class="row">
              <div class="col-md-4">
                <div class="thumbnail">
                  <img src="https://via.place holder.com/150" class="card-img" alt="Foto de perfil">
                </div>
              </div>
              <div class="col-md-8">
                <label class="form-label" for="usuario_perfil_nome"><strong>Nome:</strong></label>
                <p class="card-text" id="usuario_perfil_nome">Fulano de tal</p>

                <label class="form-label" for="usuario_perfil_telefone"><strong>Telefone:</strong></label>
                <p class="card-text" id="usuario_perfil_telefone">(99) 99999-9999</p>

                <label class="form-label" for="usuario_perfil_localizacao"><strong>Localizacao:</strong></label>
                <p class="card-text" id="usuario_perfil_localizacao">Nova York, EUA</p>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-warning" id="aUsuarioAlterar">Ver mais informações e alterar</a>
          <button type="submit" class="btn btn-primary" id="btn_fechar">Fechar</button>
        </div>
      </div>
    </div>
    
  </div>
  
  <!-- Fim do modal produto -->
  
  
  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/jquery3.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(document).ready(function() {

      // Abrir o modal de login caso o usuário tenha voltado da página de registro

      function abrirModalLogin() {
        let urlParams = new URLSearchParams(window.location.search)
        let abrirModalLogin = urlParams.get('abrirLogin')

        if (abrirModalLogin === 'true'){
          $('#janelaLogin').modal('show')
        }
      }

      abrirModalLogin()

      // Abrir modal de login
      $('#btnLogin').click(function () {
        $('#janelaLogin').modal('show')
      })

      // Abrir o modal de produto ao clicar em algum card da tela principal
      $(".card").click(function(){
        let id_produto = $(this).attr("id")
        
        $("#produto_titulo").text("Produto " + id_produto)
        
        $("#modalProduto").modal('show');
      })
      
      // Ao clicar no botão de comprar, exibir sweet alert dizendo que deu certo
      $('#btn_comprar').click(function() {
        Swal.fire({
          title: "Aviso",
          html: "Transação em andamento...",
          timer: 2000,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            
            timerInterval = setInterval(() => {
              b.textContent = Swal.getTimerLeft()
              
            }, 100)
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer){
            Swal.fire({
              title: 'Sucesso!',
              icon: 'success',
              text: 'Compra realizada com sucesso!'
            })
            
            $('#modalProduto').modal('hide')
          }
        })
      })
      
      // Mostrar perfil
      $("#btnPerfil").click(function () {
        $("#modalPerfil").modal('show')
      })
      
      
    })
  </script>
  </body>
  </html>