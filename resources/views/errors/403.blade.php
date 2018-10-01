<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/adminlte/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/css/AdminLTE.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="skin-blue sidebar-mini">
    <div class="wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          403 Error Page
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> Inicio</a></li>
          <li class="active">403 exception</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="error-page">
          <h2 class="headline text-gray"> 403</h2>

          <div class="error-content">
            <h3><i class="fa fa-warning text-gray"></i> Advertencia! Página no autorizada</h3>
            <p>
              .
            </p>
            <p>
              Usted no tiene los permisos suficientes para acceder a esta página.
              Regrese al <a href=" {{ route('dashboard') }}">inicio</a> o intente haciendo unas busqueda.
            </p>

            <form class="search-form">
              <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar">

                <div class="input-group-btn">
                  <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i>
                  </button>
                </div>
              </div>
              <!-- /.input-group -->
            </form>

          </div>
          <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- jQuery 3 --
    <script src="/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>


</body>
</html>