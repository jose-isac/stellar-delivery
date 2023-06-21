<?php 
include('php/sessao.php');
include('php/banco.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Stellar Delivery 🌠🍰</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

  <!--
    Este campo de texto tem como única função descobrir se tem um usuário logado ou não.
    Se ouver, ele vai escrever o id do usuário. Ele é oculto e só existe para que eu
    possa tirar proveito dessa informação com javascript.
  -->
    <input type="text" id="caixa_usuario" value="<?php 
        if (isset($_SESSION['usuario'])) {
          echo $_SESSION['usuario'];
        }
      ?>" style="visibility: hidden;">

<div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1>Stellar Delivery 🌠🍰</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 my-3">
        <input class="form-control" type="text" name="" placeholder="O que você deseja?" id="caixa_pesquisa">
      </div>
      <div class="d-flex flex-row-reverse col-md-4 my-3">
        <?php
          if(isset($_SESSION['login'])){
            echo '<button class="btn btn-outline-secondary" id="btnPerfil">Meu perfil</button>';
          } else {
            echo '<button class="btn btn-outline-success mr-3" id="btnLogin">Login</button>';
          }
        ?>
        <button class="btn btn-outline-primary mr-3" id="btnPesquisar" type="submit">Pesquisar</button>
      </div>
    </div>
  </div>
  
  <div class="container">
    <div class="row" id="conteudo_principal">
    <?php 
      $sql = "SELECT * FROM tb_alimentos WHERE alimento_destaque = 'S'";
      $resultado = $conexao_banco->query($sql);
      
      if ($resultado){
        if ($resultado->num_rows > 0){
          while ($linha = $resultado->fetch_array(MYSQLI_ASSOC)){
            echo 
                  '<div class="col-md-4 my-3">
                    <div class="card" data-alimentoid = "'.$linha['alimento_id'].'" id="'.$linha['alimento_nome'].'" data-descricao= "'.$linha['alimento_descricao'].'" data-categoria="'.$linha['alimento_categoria'].'" data-preco="'.$linha['alimento_preco'].'" data-disponivel="'.$linha['alimento_disponivel'].'">
                      <img src="https://via.placeholder.com/150" class="card-img-top" alt="Produto 1">
                      <div class="card-body">
                        <h5 class="card-title">'.$linha['alimento_nome'].'</h5>
                        <p class="card-text">'.$linha['alimento_descricao'].'</p>
                      </div>
                    </div>
                  </div>';
          }
        }
      }
    ?>
    </div>
  </div>
  
  
  <!-- Modal Login-->
  
<?php
if(isset($_GET['login'])){
  if(($_GET['login']) == 'erro'){
    echo '<script>
      alert("Erro no login!")
    </script>';
  }
}
?>

  <div class="modal fade" id="janelaLogin" tabindex="-1" aria-labelledby="titulo-login" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="titulo-login">Login</h3>
          <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">X</button>
        </div>
        <div class="modal-body">
          <div class="container">
            
            <form id="formLogin" class="form" action="php/login.php" method="POST">
              <label class="form-label" for="usuario_email">E-Mail</label>
              <input class="form-control" type="email" placeholder="Digite seu e-mail" id="usuario_email" name="usuario_email">
              
              <label class="form-label" for="usuario_senha">Senha</label>
              <input class="form-control" type="password" required id="usuario_senha" placeholder="Digite sua senha" name="usuario_senha">
              <hr>
              <p>
                <a href="registro.php" id="aRegistro">Ainda não tem uma conta?</a>
              </p>
              <p>
                 <a href="php/admin_area/login-page.php" id="aAdministrador">Sou administrador</a>
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
                <span style="visibility: hidden; "id="produto_id"></span>
                <ul style="list-style-type: none;">
                  <li><strong>Categoria: </strong><span id="produto_categoria"></span></li>
                  <li><strong>Descrição: </strong><span id="produto_descricao"></span></li>
                  <li><strong>Preço: </strong><span id="produto_preco"></span></li>
                  <li><strong>Quantidade disponível: </strong><span id="produto_disponivel"></span></li>
                  <li><strong>Quantidade desejada:</strong></li>
                  <li class="mt-2"><input class="form-control" type="range" name="compra_qntd" id="compra_qntd" min="1" max=""><span id="mostrador"></span></li>
                  <li class="mt-4"><span id="mensagem_esgotado" style="color: red;">Já comeram tudo!</span></li>
                </ul>
                
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
                  <img src="php/user_images/<?php echo $_SESSION['usuario_foto']?>" class="card-img" alt="Foto de perfil">
                </div>
              </div>
              <div class="col-md-8">
                <label class="form-label" for="usuario_perfil_nome"><strong>Nome:</strong></label>
                <p class="card-text" id="usuario_perfil_nome"><?php echo $_SESSION['usuario_nome']?></p>

                <label class="form-label" for="usuario_perfil_telefone"><strong>Telefone:</strong></label>
                <p class="card-text" id="usuario_perfil_telefone"><?php echo $_SESSION['usuario_telefone']?></p>

                <label class="form-label" for="usuario_perfil_localizacao"><strong>Localizacao:</strong></label>
                <p class="card-text" id="usuario_perfil_localizacao"><?php echo $_SESSION['usuario_localizacao']?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a href="php/sair.php" class="btn btn-outline-danger" id="btnLogout">Sair</a>
          <a href="alterarPerfil.php" class="btn btn-warning" id="aUsuarioAlterar">Ver mais informações e alterar</a>
          <button type="submit" class="btn btn-primary" id="btn_fechar">Fechar</button>
        </div>
      </div>
    </div>
    
  </div>
  
  <!-- Fim do modal perfil -->
  
  <script src="js/jquery3.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="js/bootstrap.bundle.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <script>
    $(document).ready(function() {

      // Por padrão, esconde a mensagem de produto esgotado.

      $("#mensagem_esgotado").hide()

      // Abrir o modal de login caso o usuário tenha voltado da página de registro

      function abrirModalLogin() {
        let urlParams = new URLSearchParams(window.location.search)
        let abrirModalLogin = urlParams.get('abrirLogin')

        if (abrirModalLogin === 'true'){
          $('#janelaLogin').modal('show')
        }
      }

      function abrirModalPerfil() {
        let urlParams = new URLSearchParams(window.location.search)
        let abrirModalPerfil = urlParams.get('abrirPerfil')

        if (abrirModalPerfil === 'true'){
          $('#modalPerfil').modal('show')
        }
      }

      abrirModalLogin()
      abrirModalPerfil()

      // Abrir modal de login
      $('#btnLogin').click(function () {
        $('#janelaLogin').modal('show')
      })


      // Abrir o modal de produto ao clicar em algum card da tela principal
      $(".card").click(function(){
        
        let titulo = $(this).attr('id')
        let descricao = $(this).attr('data-descricao')
        let categoria = $(this).attr('data-categoria')
        let preco = $(this).attr('data-preco')
        let disponivel = $(this).attr('data-disponivel')
        let id = $(this).attr('data-alimentoid')
        
        $('#produto_id').text(id)
        $('#produto_titulo').text(titulo)
        $('#produto_descricao').text(descricao)
        $('#produto_preco').text('R$ ' + preco)
        $('#produto_categoria').text(categoria)

        // Se não tiver mais disponivel, ele oculta os botoes.
        if (disponivel <= 0){
          $('#mostrador').hide()
          $('#compra_qntd').hide()
          $('#btn_comprar').hide()
          $('#mensagem_esgotado').show()
        }
        $('#produto_disponivel').text(disponivel)

        $('#mostrador').text('')
        $('#compra_qntd').attr('max', '0')
        $('#compra_qntd').attr('max', disponivel)
        
        $("#modalProduto").modal('show');
      })

      // Função para que quando o modal de produto for fechado
      // ele faça os botões aparecerem e a mensagem de esgotado
      // desaparecer
      $('#modalProduto').on('hidden.bs.modal', function(){
          $('#mostrador').show()
          $('#compra_qntd').show()
          $('#btn_comprar').show()
          $('#mensagem_esgotado').hide()
      })

      // Ao mudar o valor do range, mostrar a quantidade selecionada

      $('#compra_qntd').change(function () {
        let qntd_atual = $(this).val()
        $('#mostrador').text(qntd_atual)
      })
      

      // Ao clicar no botão de comprar, exibir sweet alert dizendo que deu certo
      
      $('#btn_comprar').click(function() {

        let usuario = $('#caixa_usuario').val()
        let alimento = $('#produto_id').text()
        let quantidade = $('#compra_qntd').val()

        if (usuario != ''){

          $.post('php/novopedido.php', {usuario_id: usuario, alimento_id: alimento, alimento_quantidade: quantidade}, function(retorno){

              if (retorno === 'certo'){
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
                          text: 'O disco voador está a caminho!'
                        })
                        
                        $('#modalProduto').modal('hide')
                      }
                    })
                } else {
                  Swal.fire({
                    icon: 'error',
                    title: 'Ops...',
                    text: 'Aparentemente, a nave está sem combústivel!'
                })
                }
          })

            
        } else {
          $('#modalProduto').modal('hide')
          $('#janelaLogin').modal('show')
        }

        
      })
      
      // Mostrar perfil
      $("#btnPerfil").click(function () {
        $("#modalPerfil").modal('show')
      })

      //Função para realizar a pesquisa

      $('#btnPesquisar').click(function() {
        let texto = $('#caixa_pesquisa').val()
        
        $.post('php/busca.php', {pesquisa: texto}, function(retorno){
          if (retorno != '0') {
            $('#conteudo_principal').html(retorno)
          } else {
            $('#conteudo_principal').html("<div class='container'><h3>Este alimento caiu em um buraco negro!</h3></div>")
          }
        })
      })
      
      
    })
  </script>
  </body>
  </html>