<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>E&Q Online</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Theme style -->
  <link rel="stylesheet" href="/resources/admin/dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- Link for the favicon of the website. -->
  <link rel="icon" href="/resources/admin/images/favicon.ico" type="image/x-icon">

  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="/resources/admin/plugins/datatables/datatables.css"/>

  <!-- Date range picker -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

  <style>
  .full {
    background: linear-gradient(rgba(0, 0, 0, .7), rgba(0, 0, 0, .8)), url(/resources/admin/images/af.png) fixed center no-repeat /cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
    height: 100vh;
  }

  .nav-treeview i {
    margin-left: 10px;
  }

</style>

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">

      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href=""><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/admin" class="nav-link text-uppercase">Painel de Administração</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item d-sm-inline-block">
          <a href="/admin/logout" class="nav-link font-weight-bold" onclick="return confirm('Você realmente deseja sair?')">Sair</a>
        </li>

      </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="/admin" class="brand-link">
        <!-- <img src="../../resources/site/images/logo.png" alt="Company Logo" class="brand-image img-circle elevation-3"
          style="background-color: white; border-radius: 3px;"> -->
          <span class="brand-text font-weight-light" style="margin-left: 20px;">E&Q Online</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="image">
              <!-- <img src="/resources/admin/images/eu.png" class="img-circle elevation-2" alt="User Image"> -->
            </div>

            <div class="info">
              <a href="/admin/users/1" class="d-block">André Fellipe da Silva</a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

             <li class="nav-item has-treeview menu-closed">

              <a href="" class="nav-link upper-item">
                <i class="nav-icon fa fa-clock"></i>
                <p>
                  Ponto
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="/admin/log/register" class="nav-link">
                    <i class="fa fa-door-open nav-icon"></i>
                    <p>Entrada e Saída</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="/admin/log/records" class="nav-link">
                    <i class="fa fa-search nav-icon"></i>
                    <p>Registros</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="/admin/log/absences" class="nav-link">
                    <i class="fa fa-clinic-medical nav-icon"></i>
                    <p>Faltas</p>
                  </a>
                </li>

              </ul>

            </li>

            <li class="nav-item">
              <a href="/admin/users" class="nav-link upper-item">
                <i class="nav-icon fa fa-users"></i>
                <p>
                  Usuários
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="/admin/proposals" class="nav-link upper-item">
                <i class="nav-icon fa fa-file-signature"></i>
                <p>
                  Propostas
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="/admin/services" class="nav-link upper-item">
                <i class="nav-icon fa fa-dollar-sign"></i>
                <p>
                  Serviços
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview menu-closed">

              <a href="" class="nav-link upper-item">
                <i class="nav-icon fa fa-warehouse"></i>
                <p>
                  Almoxarifado
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="/admin/warehouse/products" class="nav-link">
                    <i class="fa fa-archive nav-icon"></i>
                    <p>Produtos</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="/admin/warehouse/reports" class="nav-link">
                    <i class="fa fa-file nav-icon"></i>
                    <p>Relatórios</p>
                  </a>
                </li>

              </ul>

            </li>

            <li class="nav-item has-treeview menu-closed">

              <a href="" class="nav-link upper-item">
                <i class="nav-icon fa fa-car"></i>
                <p>
                  Veículos
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="/admin/vehicles/travels" class="nav-link">
                    <i class="fa fa-globe-americas nav-icon"></i>
                    <p>Viagens</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="/admin/vehicles/fuel" class="nav-link">
                    <i class="fa fa-gas-pump nav-icon"></i>
                    <p>Abastecimentos</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="/admin/vehicles/data" class="nav-link">
                    <i class="fa fa-chart-pie nav-icon"></i>
                    <p>Dados</p>
                  </a>
                </li>

              </ul>

            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

