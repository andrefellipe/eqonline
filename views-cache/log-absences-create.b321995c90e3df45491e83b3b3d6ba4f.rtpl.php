<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cadastrar Falta</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/log/register">Ponto</a></li>
            <li class="breadcrumb-item"><a href="/admin/log/absences">Faltas</a></li>
            <li class="breadcrumb-item active">Cadastrar Falta</li>
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

            <form role="form" action="/admin/log/absences/create/<?php echo htmlspecialchars( $user["id_user"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
              <div class="card-body">

                <div class="form-group">
                  <label>Nome</label>
                  <input type="text" class="form-control" value="<?php echo htmlspecialchars( $user["des_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled>
                </div>

                <div class="form-group">
                  <label>Data</label>
                  <input type="date" class="form-control" name="dt" />
                </div>

                <div class="form-group">
                  <label>Justificativa</label>
                  <input type="text" class="form-control" name="des_justification" placeholder="Insira a justificativa">
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>