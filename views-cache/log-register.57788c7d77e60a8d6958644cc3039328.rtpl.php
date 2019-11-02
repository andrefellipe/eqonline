<?php if(!class_exists('Rain\Tpl')){exit;}?>  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <div class="content full">
      <div class="container h-100">
        <div class="row align-items-center h-100">
          <div class="col text-center text-light" style="margin-top: -1rem">

            <h1>Registrar Horários</h1>
            <p>Nesta seção, você registra os seus horários de entrada e saída da E&Q.</p>
            <!-- =========================================================== -->

            <!-- Small Box (Stat card) -->
            <div class="row" style="margin-top: 0.25rem">
              <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-info-gradient">
                  <div class="inner">
                    <h4>Entrada</h4>
                    <p>Chegando na empresa?</p>
                    <p>Registre sua entrada.</p>
                  </div>
                  <a href="/admin/log/in/1" class="small-box-footer" onclick="return confirm('Registrar entrada?')">
                    Clique aqui <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-success-gradient">
                  <div class="inner">
                    <h4>Saída</h4>
                    <p>Saindo da empresa?</p>
                    <p>Registre sua saída.</p>
                  </div>
                  <a href="/admin/log/out/1" class="small-box-footer" onclick="return confirm('Registrar saída?')">
                    Clique aqui <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-dark-gradient">
                  <div class="inner">
                    <h4>Hora Extra: Entrada</h4>
                    <p>Vai fazer hora extra?</p>
                    <p>Registre o início.</p>
                  </div>
                  <a href="/admin/log/in/extra/1" class="small-box-footer" onclick="return confirm('Registrar entrada de hora extra?')">
                    Clique aqui <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-secondary-gradient">
                  <div class="inner">
                    <h4>Hora Extra: Saída</h4>
                    <p>Fim de hora extra?</p>
                    <p>Registre o término.</p>
                  </div>
                  <a href="/admin/log/out/extra/1" class="small-box-footer" onclick="return confirm('Registrar saída de hora extra?')">
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
