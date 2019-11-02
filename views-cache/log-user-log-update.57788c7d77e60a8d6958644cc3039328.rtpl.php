<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Editar Registro</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Insira a data e os horários de trabalho</h3>
            </div>
            <!-- /.card-header -->

            <!-- form start -->
            <form role="form">
              <div class="card-body">

                <div class="form-group">
                  <label>Nº</label>
                  <input type="text" class="form-control" value="17" disabled>
                </div>

                <div class="form-group">
                  <label>Nome</label>
                  <input type="text" class="form-control" value="André Fellipe da Silva" disabled>
                </div>

                <!-- Date and time range -->
                <div class="form-group">
                  <label>Data e Hora de Início</label>

                  <div class="input-group">
                    <input type="text" class="form-control float-right" name="log-date-hour" value="02/01/2019 08:10" />
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- Date and time range -->
                <div class="form-group">
                  <label>Data e Hora de Término</label>

                  <div class="input-group">
                    <input type="text" class="form-control float-right" name="log-date-hour" value="02/01/2019 18:00" />
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- checkbox -->
                <div class="form-group">
                  <label>
                    <input type="checkbox" class="minimal">
                    Hora Extra
                  </label>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>

            </form>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  </section>
  <!-- /.content -->
</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
  <div class="p-3">
      <!-- <h5>Title</h5>
        <p>Sidebar content</p> -->
      </div>
    </aside>
    <!-- /.control-sidebar -->
