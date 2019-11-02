<?php if(!class_exists('Rain\Tpl')){exit;}?>  <div class="content-wrapper">
    <div class="content full">
      <div class="container h-100">
        <div class="row align-items-center h-100">
          <div class="col text-center text-light" style="margin-top: -1rem">

            <h1>Verificar Registros</h1>
            <p>Nesta seção, você verifica os seus horários de entrada e saída da E&Q.</p>

            <div class="row" style="margin-top: 0.25rem">

              <div class="col-lg-4 col-12">
                <div class="small-box bg-info-gradient">
                  <div class="inner">
                    <h4>Cadastrar Falta</h4>
                    <p>Aqui você justificar sua falta caso você tenha perdido dias de trabalho.</p>
                  </div>
                  <a href="/admin/log/absences/create/<?php echo htmlspecialchars( $user["id_user"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="small-box-footer">
                    Clique aqui <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>

              <div class="col-lg-4 col-12">
                <div class="small-box bg-success-gradient">
                  <div class="inner">
                    <h4>Minhas Faltas</h4>
                    <p>Aqui você pode verificar suas faltas registradas no sistema.</p>
                  </div>
                  <a href="/admin/log/absences/<?php echo htmlspecialchars( $user["id_user"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="small-box-footer">
                    Clique aqui <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>

              <div class="col-lg-4 col-12">
                <div class="small-box bg-dark-gradient">
                  <div class="inner">
                    <h4>Gerenciar Faltas</h4>
                    <p>Aqui a administração pode alterar os registros de faltas dos funcionários.</p>
                  </div>
                  <a href="/admin/log/absences/users" class="small-box-footer">
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