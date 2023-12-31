<?php 
include('../testasessao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
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
    <a href="#" class="brand-link">
      <img src="../../../favicon.svg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Stellar Delivery</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img style="height: 40px; width: 40px;" src="../../user_images/<?php echo $_SESSION['usuario_foto']?>" class="img-circle elevation-2" alt="User Image">
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
            <a href="../alimentos/alimentos.php" class="nav-link">
              <i class="nav-icon fa-solid fa-burger"></i>
              <p>
                Alimentos
              </p>
            </a>
          </li><li class="nav-item">
            <a href="../pedidos/pedidos.php" class="nav-link">
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
            <h1 class="m-0">Usuários</h1>
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

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" id="caixaPesquisa" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                  <button type="submit" id="btnPesquisar" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                  <a class="btn btn-success" href="form-adicionar.php"><i class="fa-solid fa-plus"></i></a>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>E-mail</th>
                  <th>Telefone</th>
                  <th>CPF</th>
                  <th>Opções</th>
                </tr>
              </thead>
              <tbody id="corpo_tabela">
                <?php 
                  include('../../banco.php');
                  $sql = "SELECT * FROM tb_usuarios";
                  $resultado = $conexao_banco->query($sql);
                  if ($resultado) {
                    if ($resultado->num_rows > 0) {
                      while ($linha=$resultado->fetch_array(MYSQLI_ASSOC)){
                        echo '
                          <tr data-usuarioid="'.$linha['usuario_id'].'" data-usuario-nome="'.$linha['usuario_nome'].'" data-usuario-email="'.$linha['usuario_email'].'" data-usuario-senha="'.$linha['usuario_senha'].'" data-usuario-telefone="'.$linha['usuario_telefone'].'" data-usuario-cpf="'.$linha['usuario_cpf'].'" data-usuario-foto="'.$linha['usuario_foto'].'" data-usuario-cep="'.$linha['usuario_cep'].'" data-usuario-estado="'.$linha['usuario_estado'].'" data-usuario-cidade="'.$linha['usuario_cidade'].'" data-usuario-bairro="'.$linha['usuario_bairro'].'" data-usuario-rua="'.$linha['usuario_rua'].'" data-usuario-numero="'.$linha['usuario_numero'].'" data-usuario-complemento="'.$linha['usuario_complemento'].'" data-usuario-adm="'.$linha['usuario_adm'].'">

                              <td>'.$linha['usuario_id'].'</td>
                              <td>'.$linha['usuario_nome'].'</td>
                              <td>'.$linha['usuario_email'].'</td>
                              <td>'.$linha['usuario_telefone'].'</td>
                              <td>'.$linha['usuario_cpf'].'</td>
                              <td>
                                  <a class="btn btn-warning" href="form-alterar.php?usuario='.$linha['usuario_id'].'"><i class="fa-solid fa-pencil"></i></a>
                              </td>

                          </tr>
                      ';
                      }
                    }
                  }
                ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
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

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $(document).ready(function(){

    function sweetAlerts() {
      let urlParams = new URLSearchParams(window.location.search)
      let aviso = urlParams.get('excluir')

      if (aviso === 'ok'){
        Swal.fire({
          title: "Sucesso!",
          icon: "success",
          text: "Usuário excluido com sucesso."
        })
      } else if (aviso === 'erro') {
        Swal.fire({
          title: "Erro!",
          icon: "error",
          text: "Erro ao excluir usuário."
        })
      }
    }

    sweetAlerts()

    // Função de pesquisa:
    $('#btnPesquisar').click(function() {
      let texto = $('#caixaPesquisa').val()
      $.post('busca.php', {pesquisa: texto}, function(retorno){
        if (retorno != '0'){
          $('#corpo_tabela').html(retorno)
        }
      })
    })

    
  })
</script>

</body>
</html>
