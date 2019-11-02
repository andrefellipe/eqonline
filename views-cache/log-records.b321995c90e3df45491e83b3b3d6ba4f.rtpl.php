<?php if(!class_exists('Rain\Tpl')){exit;}?>  <div class="content-wrapper">
    <div class="content full">
      <div class="container h-100">
        <div class="row align-items-center h-100">
          <div class="col text-center text-light" style="margin-top: -1rem">

            <h1>Verificar Registros</h1>
            <p>Nesta seção, você verifica os seus horários de entrada e saída da E&Q.</p>

            <div class="row" style="margin-top: 0.25rem">
              <div class="col-lg-6 col-12">
                <div class="small-box bg-info-gradient">
                  <div class="inner">
                    <h4>Meus Registros</h4>
                    <p>Aqui você pode visualizar os seus registros de horários.</p>
                  </div>
                  <a href="/admin/log/records/<?php echo htmlspecialchars( $user["id_user"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="small-box-footer">
                    Clique aqui <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>

              <div class="col-lg-6 col-12">
                <div class="small-box bg-success-gradient">
                  <div class="inner">
                    <h4>Gerenciar Registros</h4>
                    <p>Aqui a administração pode alterar os registros de horários.</p>
                  </div>
                  <a href="/admin/log/records/users" class="small-box-footer">
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