<?php 
include('../testasessao.php');
include('../../banco.php');

if (isset($_GET['usuario'])){
  $usuario_id = $_GET['usuario'];

  $sql = "SELECT * FROM tb_usuarios WHERE usuario_id = '$usuario_id'";

  $resultado = $conexao_banco->query($sql);

  if ($resultado){
    if ($resultado->num_rows > 0) {
      $linha = $resultado->fetch_array(MYSQLI_ASSOC);
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Stellar Delivery | Área Restrita</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/9b79b096e6.js" crossorigin="anonymous"></script>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
  <link rel="shortcut icon" href="../../../favicon.svg" type="image/svg">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../home-page.php" class="brand-link">
      <img src="../../../favicon.svg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Stellar Delivery</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img style="height: 40px; width: 40px;" src="../../user_images/<?php echo $_SESSION['usuario_foto']?>" name="fotoPerfil" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['usuario_reduzido']?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="../home-page.php" class="nav-link">
              <i class="nav-icon fa-solid fa-house"></i>
              <p>
                Tela inicial
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../../index.php" class="nav-link">
              <i class="nav-icon fa-solid fa-mitten"></i>
              <p>
                Área do Cliente
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa-solid fa-user"></i>
              <p>
                Usuários
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa-solid fa-burger"></i>
              <p>
                Alimentos
              </p>
            </a>
          </li><li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa-solid fa-clipboard"></i>
              <p>
                Pedidos
              </p>
            </a>
          </li>
          </li><li class="nav-item">
            <a href="../sair.php" class="nav-link">
            <i class=" nav-icon fa-solid fa-right-from-bracket"></i>
              <p>
                Sair
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Alterar usuário</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
          <a class="btn btn-info" href="usuarios.php">Voltar</a>
            <div class="card-tools">
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form id="form-alterar" method="POST" enctype="multipart/form-data" action="alterar.php">
              <div class="row">
                  <div class="col-md-4">
                    <div class="picture">
                        <img style="width: 200px; height: 200px;" src="../../user_images/<?php echo $linha['usuario_foto']?>" alt="user_image">
                        <label class="form-label mt-2" for="">Foto de perfil(opcional):</label>
                        <input class="form-control" type="file" name="fotoPerfil" id="usuario_foto">
                    </div>
                  </div>
                  <div class="col-md-8">
                      <div class="row">
                          <div class="col-md-12">
                            <label class="form-label" for="">Usuário ID:</label>
                            <input class="form-control" id="usuario_id" name="usuario_id" required value="<?php echo $linha['usuario_id'] ?>" readonly type="text">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                            <label class="form-label" for="">Nome:</label>
                            <input class="form-control" type="text" name="usuario_nome" id="usuario_nome" value="<?php echo $linha['usuario_nome']?>" required>
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="">CPF:</label><span id="cpf_error_message" style="display: none; color: red;">Inválido! Tente novamente.</span>
                            <input class="form-control" type="text" name="usuario_cpf" id="usuario_cpf" value="<?php echo $linha['usuario_cpf']?>" required>
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="">Telefone:</label>
                            <input class="form-control" type="text" name="usuario_telefone" id="usuario_telefone" value="<?php echo $linha['usuario_telefone']?>" required>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <label class="form-label" for="">E-mail:</label>
                              <input class="form-control" name="usuario_email" id="usuario_email" type="text" required value="<?php echo $linha['usuario_email'] ?>">
                          </div>
                          <div class="col-md-3">
                              <label class="form-label" for="">Senha:</label>
                              <input class="form-control" name="usuario_senha" id="usuario_senha" type="text" required value="<?php echo $linha['usuario_senha'] ?>">
                          </div>
                          <div class="col-md-3">
                              <label class="form-label" for="">Repetir senha:</label>
                              <input class="form-control" name="usuario_senha" id="usuario_senha_repetir" type="text" required value="<?php echo $linha['usuario_senha'] ?>">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-4">
                              <label class="form-label" for="">CEP:</label>
                              <input class="form-control" type="text" name="usuario_cep" id="usuario_cep" required value="<?php echo $linha['usuario_cep'] ?>">
                          </div>
                          <div class="col-md-4">
                              <label class="form-label" for="">ESTADO:</label>
                              <select class="form-control" name="usuario_estado" id="usuario_estado">
                                <option value="<?php echo $linha['usuario_estado']?>"><?php echo $linha['usuario_estado']?></option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AM">Amazônia</option>
                                <option value="AP">Amapá</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiânia</option>
                                <option value="MA">Maranhão</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="PR">Paraná</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SE">Sergipe</option>
                                <option value="SP">São Paulo</option>
                                <option value="TO">Tocantins</option>
                              </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="">Cidade:</label>
                            <input class="form-control" id="usuario_cidade" name="usuario_cidade" type="text" required value="<?php echo $linha['usuario_cidade'] ?>">
                        </div>

                      </div>
                      <div class="row">
                          <div class="col-md-6">
                            <label class="form-label" for="">Bairro:</label>
                            <input class="form-control" id="usuario_bairro" name="usuario_bairro" type="text" required value="<?php echo $linha['usuario_bairro'] ?>">
                          </div>
                          <div class="col-md-6">
                            <label class="form-label" for="">Rua:</label>
                            <input class="form-control" id="usuario_rua" name="usuario_rua" type="text" required value="<?php echo $linha['usuario_rua'] ?>">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-2">
                              <label class="form-label" for="">Número:</label>
                              <input class="form-control" type="text" name="usuario_numero" id="usuario_numero" required value="<?php echo $linha['usuario_numero']?>">
                          </div>
                          <div class="col-md-10">
                              <label class="form-label" for="">Complemento:</label>
                              <input class="form-control" type="text" name="usuario_complemento" id="usuario_complemento" required value="<?php echo $linha['usuario_complemento'] ?>">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-3">
                              <label class="form-label" for="">É administrador?</label>
                              <select class="form-control" name="usuario_adm" id="usuario_adm">
                                  <option value="<?php echo $linha['usuario_adm'] ?>"><?php echo $linha['usuario_adm'] ?></option>
                                  <option value=""></option>
                                  <option value="S">S</option>
                                  <option value="N">N</option>
                              </select>
                          </div>
                      </div>
                  </div>
              </div>
            
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
              <div class="d-flex flex-row-reverse">
                <button class="btn btn-success" name="btnSalvar" id="btnSalvar" type="submit">Salvar</button>
              </div>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>


<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>

<script src="../../../js/validacpf.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $(document).ready(function(){

    function sweetAlerts() {
      let urlParams = new URLSearchParams(window.location.search)
      let alerta = urlParams.get('alteracao')

      if (alerta === 'ok') {
        Swal.fire({
          title: "Sucesso!",
          icon: "success",
          text: "Alteração feita com sucesso!"
        })
      } else if (alerta === 'erro') {
        Swal.fire({
          title: "Erro!",
          icon: "error",
          text: "Algo deu errado!"
        })
      }
      else if (alerta === "cpf-e-email-ja-cadastrados") {
        Swal.fire({
          title: "Erro!",
          icon: "error",
          text: "Um usuário com este mesmo e-mail e CPF já foi cadastrado! Tente novamente com outras credenciais."
        })
      } 
      else if (alerta === "cpf-ja-cadastrado") {
        Swal.fire({
          title: "Erro!",
          icon: "error",
          text: "Um usuário com este mesmo CPF já foi cadastrado! Tente novamente com outra credencial."
        })
      }
      else if (alerta === "email-ja-cadastrado") {
        Swal.fire({
          title: "Erro!",
          icon: "error",
          text: "Um usuário com este mesmo endereço de e-mail já foi cadastrado! Tente novamente com outro endereço."
        })
      }
    }

    sweetAlerts()

    //
    $('#usuario_cpf').inputmask('999.999.999-99')
    $('#usuario_telefone').inputmask('(99) 99999-9999')

    $('#usuario_cpf').blur(function() {
      let cpf = $(this).val().replace(/\D/g, '')
      
      if (cpfValido(cpf)){
        $('#cpf_error_message').css('display', 'none')
      } else {
        $('#usuario_cpf').val('')
        $('#cpf_error_message').css('display', 'inline')
      }
    })

    $('#usuario_senha_repetir').blur(function() {
      let senha1 = $('#usuario_senha').val()
      let senha2 = $(this).val()

      if (senha1 != senha2) {
        $(this).val('')
        alert('As senhas não coincidem!')
      }
    })
    
    $('#usuario_cep').on('blur', function() {
        var cep = $(this).val().replace(/\D/g, '');

        if (cep.length === 8) {
          var url = `https://viacep.com.br/ws/${cep}/json/`;

          $.getJSON(url, function(data) {
            if (!("erro" in data)) {
              $('#usuario_estado').val(data.uf);
              $('#usuario_cidade').val(data.localidade);
              $('#usuario_rua').val(data.logradouro);
              $('#usuario_bairro').val(data.bairro);
              $('#usuario_numero').focus();
            } else {
              alert('CEP não encontrado.');
            }
          });
        }
      });

    
  })
</script>

</body>
</html>
