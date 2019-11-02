<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Editar Falta</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/log/register">Ponto</a></li>
            <li class="breadcrumb-item"><a href="/admin/log/absences">Faltas</a></li>
            <li class="breadcrumb-item"><a href="/admin/log/absences/users">Todas as Faltas</a></li>
            <li class="breadcrumb-item active">Editar Falta</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Informações</h3>
            </div>

            <form role="form" action="/admin/users/<?php echo htmlspecialchars( $absence["id_user"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/absence/<?php echo htmlspecialchars( $absence["id_absence"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
              <div class="card-body">

                <div class="form-group">
                  <label>Data</label>
                  <input type="date" class="form-control" name="dt" value="<?php echo htmlspecialchars( $absence["dt"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"/>
                </div>

                <div class="form-group">
                  <label>Justificativa</label>
                  <input type="text" class="form-control" placeholder="Insira a justificativa" name="des_justification" value="<?php echo htmlspecialchars( $absence["des_justification"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Alterar Dados</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>