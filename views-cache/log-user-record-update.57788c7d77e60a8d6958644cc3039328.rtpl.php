<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Editar Falta</h1>
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
              <h3 class="card-title">Insira a data e a justificativa para a sua ausência</h3>
            </div>
            <!-- /.card-header -->

            <!-- form start -->
            <form role="form">
              <div class="card-body">

                <div class="form-group">
                  <label>Nome</label>
                  <input type="text" class="form-control" placeholder="André Fellipe da Silva" disabled>
                </div>

                <!-- Date and time range -->
                <div class="form-group">
                  <label>Selecione a data abaixo:</label>

                  <div class="input-group">
                    <input type="text" class="form-control float-right" name="absence-date" />
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- text input -->
                <div class="form-group">
                  <label>Insira sua justificativa abaixo:</label>
                  <input type="text" class="form-control" placeholder="Justificativa">
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
