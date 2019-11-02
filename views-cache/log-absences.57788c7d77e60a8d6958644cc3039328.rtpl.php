<?php if(!class_exists('Rain\Tpl')){exit;}?>  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <div class="content full">
      <div class="container h-100">
        <div class="row align-items-center h-100">
          <div class="col text-center text-light" style="margin-top: -1rem">

            <h1>Verificar Registros</h1>
            <p>Nesta seção, você verifica os seus horários de entrada e saída da E&Q.</p>
            <!-- =========================================================== -->

            <!-- Small Box (Stat card) -->
            <div class="row" style="margin-top: 0.25rem">

              <div class="col-lg-4 col-12">
                <!-- small card -->
                <div class="small-box bg-info-gradient">
                  <div class="inner">
                    <h4>Justificar Falta</h4>
                    <p>Aqui você justificar sua falta caso você tenha perdido dias de trabalho.</p>
                  </div>
                  <a href="/admin/log/absences/add" class="small-box-footer">
                    Clique aqui <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->

              <div class="col-lg-4 col-12">
                <!-- small card -->
                <div class="small-box bg-success-gradient">
                  <div class="inner">
                    <h4>Minhas Faltas</h4>
                    <p>Aqui você pode verificar suas faltas registradas no sistema.</p>
                  </div>
                  <a href="/admin/log/absences/1" class="small-box-footer">
                    Clique aqui <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->

              <div class="col-lg-4 col-12">
                <!-- small card -->
                <div class="small-box bg-dark-gradient">
                  <div class="inner">
                    <h4>Gerenciar Faltas</h4>
                    <p>Aqui a administração pode alterar os registros de faltas dos funcionários.</p>
                  </div>
                  <a href="/admin/log/absences/all" class="small-box-footer">
                    Clique aqui <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->

            </div>
            <!-- /.row -->

            <!-- =========================================================== -->
          </div>
        </div>
      </div>
    </div>
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
