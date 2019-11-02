<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Minhas Faltas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <!--
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Tables</li>
          -->
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!--
        <div class="card-header">
           <a href="/admin/services/add" class="btn btn-success">Adicionar Serviço</a>
          <div class="card-tools">
            
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Pesquisar">
              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          
        </div>
      </div>
    -->

    <!-- /.card-header -->
    <div class="card-body table-responsive">
      <table id="my-records" class="table table-bordered table-striped">

        <thead>
          <tr>
            <th>Nº</th>
            <th>Data</th>
            <th>Justificativa</th>
          </tr>
        </thead>

        <tbody>

          <tr>
            <td>1</td>
            <td>2019-02-20</td>
            <td>Dor de cabeça</td>
          </tr>

          <tr>
            <td>2</td>
            <td>2019-02-01</td>
            <td>Dor de barriga</td>
          </tr>

          <tr>
            <td>3</td>
            <td>2018-01-11</td>
            <td>Ida ao cardiologista</td>
          </tr>

          <tr>
            <td>4</td>
            <td>2018-06-25</td>
            <td>Moto quebrada</td>
          </tr>

        </tbody>

      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
  <div class="p-3">
      <!-- <h5>Title</h5>
        <p>Sidebar content</p> -->
      </div>
    </aside>
    <!-- /.control-sidebar -->
