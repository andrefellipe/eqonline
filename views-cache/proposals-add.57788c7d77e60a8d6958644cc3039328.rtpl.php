<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Adicionar Proposta</h1>
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
        <!-- column -->
        <div class="col-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Informações do Cliente</h3>
            </div>
            <!-- /.card-header -->

            <!-- form start -->
            <form role="form">
              <div class="card-body">
                <!-- Name of the user -->
                <div class="form-group">
                  <label>Nome do Cliente</label>
                  <input type="text" class="form-control" placeholder="Digite o nome">
                </div>
                <!-- /.form group -->

                <!-- text input -->
                <div class="form-group">
                  <label>Nome do Contato</label>
                  <input type="text" class="form-control" placeholder="Digite o nome do contato">
                </div>

                <!-- phone mask -->
                <div class="form-group">
                  <label>Celular do Contato</label>
                  <input type="text" class="form-control" placeholder="Digite o número do celular" data-inputmask='"mask": "99999-9999"' data-mask>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                  <label for="desemail">Email do Contato</label>
                  <input type="email" class="form-control" id="desemail" name="desemail" placeholder="Digite o email">
                </div>

                <div class="form-group">
                  <label>Data da Proposta</label>
                  <input type="text" class="form-control" placeholder="Digite a data da proposta" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

              </div>

              <!-- /.card-body -->

            </form>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

      <div class="row">
        <!-- column -->
        <div class="col-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Descrição do Material</h3>
            </div>
            <!-- /.card-header -->

            <!-- form start -->
            <form role="form">
              <div class="card-body">
                
                <!-- Name of the user -->
                <div class="form-group">
                  <label>Nome do Cliente</label>
                  <input type="text" class="form-control" placeholder="Digite o nome">
                </div>
                <!-- /.form group -->

                <!-- text input -->
                <div class="form-group">
                  <label>Nome do Contato</label>
                  <input type="text" class="form-control" placeholder="Digite o login">
                </div>

                <!-- phone mask -->
                <div class="form-group">
                  <label>Celular do Contato</label>
                  <input type="text" class="form-control" placeholder="Digite o número do celular" data-inputmask='"mask": "99999-9999"' data-mask>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                  <label for="desemail">Email do Contato</label>
                  <input type="email" class="form-control" id="desemail" name="desemail" placeholder="Digite o email">
                </div>

                <div class="form-group">
                  <label>Data da Proposta</label>
                  <input type="text" class="form-control" placeholder="Digite a data da proposta" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

              </div>

              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Adicionar Proposta</button>
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
