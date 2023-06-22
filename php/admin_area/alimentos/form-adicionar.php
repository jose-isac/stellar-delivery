<?php 
include('../testasessao.php');
include('../../banco.php');
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
    <a href="#" class="brand-link">
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
            <a href="../usuarios/usuarios.php" class="nav-link">
              <i class="nav-icon fa-solid fa-user"></i>
              <p>
                Usuários
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="alimentos.php" class="nav-link active">
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
            <h1 class="m-0">Adicionar alimento</h1>
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
          <a class="btn btn-info" href="alimentos.php">Voltar</a>
            <div class="card-tools">
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form id="form-alterar" method="POST" enctype="multipart/form-data" action="salvar.php">
              <div class="row">
                  
                  
                  <div class="col-md-4">
                    <div class="picture">
                        <img style="width: 250px; height: 250px;" src="../../food_images/defaultfood.png" alt="user_image">
                        <label class="form-label mt-1" for="">Foto do alimento:</label>
                        <input class="form-control" type="file" name="fotoAlimento" id="alimento_imagem">
                        
                    </div>
                  </div>
                  <div class="col-md-8">
                      <div class="row">
                          <div class="col-md-8">
                            <label class="form-label" for="">Nome:</label>
                            <input class="form-control" type="text" name="alimento_nome" id="alimento_nome" value="" required>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="">Categoria:</label>
                            <select class="form-control" name="alimento_categoria" id="alimento_categoria">
                                <option value="Doce">Doce</option>
                                <option value="Salgado">Salgado</option>
                                <option value="Bebida">Bebida</option>
                                <option value="Saudavel">Saudável</option>
                            </select>
                          </div>
                      </div>
                      <div class="row">
                         <div class="col-md-12">
                          <label class="form-label" for="">Descrição:</label>
                            <textarea class="form-control" required name="alimento_descricao" id="alimento_descricao" cols="30" rows="4"></textarea>
                         </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <label class="form-label" for="">Preço(R$):</label>
                              <input class="form-control" name="alimento_preco" id="alimento_preco" type="text" required value="">
                          </div>
                          <div class="col-md-6">
                              <label class="form-label" for="">Quantidade disponível:</label>
                              <input class="form-control" name="alimento_disponivel" id="alimento_disponivel" min="0" type="number" required value="">
                          </div>
                      </div>
                      
                      <div class="row">
                          <div class="col-md-7">
                              <label class="form-label" for="">Este alimento estará em destaque na tela inicial?</label>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-3">
                          <select class="form-control" name="alimento_destaque" id="alimento_destaque">
                                  <option value=""></option>
                                  <option value="S">Sim</option>
                                  <option value="N">Não</option>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

<script>
  $(document).ready(function(){

    function sweetAlerts() {
      let urlParams = new URLSearchParams(window.location.search)
      let alerta = urlParams.get('cadastro')

      if (alerta === 'ok') {
        Swal.fire({
          title: "Sucesso!",
          icon: "success",
          text: "Alimento adicionado com sucesso!"
        })
      } else if (alerta === 'erro') {
        Swal.fire({
          title: "Erro!",
          icon: "error",
          text: "Algo deu errado!"
        })
      }
      
    }

    sweetAlerts()

    $('#alimento_preco').maskMoney({
      allowNegative: false,
      thousands: '.',
      decimal: ',',
      affixesStay: false
    })

    
  })
</script>

</body>
</html>
