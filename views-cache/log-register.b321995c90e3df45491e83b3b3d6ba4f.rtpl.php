<?php if(!class_exists('Rain\Tpl')){exit;}?>  <div class="content-wrapper">
    <div class="content full">
      <div class="container h-100">
        <div class="row align-items-center h-100">
          <div class="col text-center text-light">

            <h1>Registrar Horários</h1>
            <p>Nesta seção, você registra os seus horários de entrada e saída da E&Q.</p>

            <div class="row">

              <div class="col-lg-6 col-6">
                <div class="small-box bg-info-gradient">
                  <div class="inner">
                    <h4>Entrada</h4>
                    <p>Chegando na empresa? Registre sua entrada.</p>
                  </div>
                  <a href="/admin/log/in/<?php echo htmlspecialchars( $user["id_user"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="small-box-footer">
                    Clique aqui <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>

              <div class="col-lg-6 col-6">
                <div class="small-box bg-success-gradient">
                  <div class="inner">
                    <h4>Saída</h4>
                    <p>Saindo da empresa? Registre sua saída.</p>
                  </div>
                  <a href="/admin/log/out/<?php echo htmlspecialchars( $user["id_user"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="small-box-footer">
                    Clique aqui <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>

              <div class="col-lg-6 col-6">
                <div class="small-box bg-dark-gradient">
                  <div class="inner">
                    <h4>Início de Intervalo</h4>
                    <p>Começando o intervalo? Registre o início.</p>
                  </div>
                  <a href="/admin/log/out/lunch/<?php echo htmlspecialchars( $user["id_user"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="small-box-footer">
                    Clique aqui <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>

              <div class="col-lg-6 col-6">
                <div class="small-box bg-secondary-gradient">
                  <div class="inner">
                    <h4>Volta do Almoço</h4>
                    <p>Voltando do almoço? Registre o retorno.</p>
                  </div>
                  <a href="/admin/log/in/lunch/<?php echo htmlspecialchars( $user["id_user"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="small-box-footer">
                    Clique aqui <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>