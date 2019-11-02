<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Editar Dados de Usuário</h1>
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
              <h3 class="card-title">Informações</h3>
            </div>
            <!-- /.card-header -->

            <!-- form start -->
            <form role="form">
              <div class="card-body">
                <!-- Name of the user -->
                <div class="form-group">
                  <label>Nome</label>
                  <input type="text" class="form-control" placeholder="Digite o nome" value="André Fellipe da Silva">
                </div>
                <!-- /.form group -->

                <!-- text input -->
                <div class="form-group">
                  <label>Login</label>
                  <input type="text" class="form-control" placeholder="Digite o login" value="andre">
                </div>

                <!-- phone mask -->
                <div class="form-group">
                  <label>Celular</label>
                  <input type="text" class="form-control" placeholder="Digite o número do celular" data-inputmask='"mask": "99999-9999"' data-mask value="99697-5363">
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group">
                  <label for="despassword">Senha</label>
                  <input type="password" class="form-control" id="despassword" name="despassword" placeholder="Digite a senha" value="damn">
                </div>

                <!-- select -->
                <div class="form-group">
                  <label>Categoria</label>
                  <select class="form-control">
                    <option>Administrador</option>
                    <option>Estagiário</option>
                    <option>Técnico</option>
                  </select>
                </div>

              </div>


              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Alterar Dados</button>
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
