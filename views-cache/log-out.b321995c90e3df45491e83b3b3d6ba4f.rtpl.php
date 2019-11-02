<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">
          <h1>Registrar Saída</h1>
        </div>

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/log/register">Registrar Horários</a></li>
            <li class="breadcrumb-item active">Registrar Saída</li>
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

            <?php if( $msgError != '' ){ ?>
            <div class="alert alert-danger alert-dismissible" style="margin:10px">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <p><?php echo htmlspecialchars( $msgError, ENT_COMPAT, 'UTF-8', FALSE ); ?> Clique <a href="/admin/log/records/<?php echo htmlspecialchars( $user["id_user"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">aqui</a> para verificar seus registros ou fale com um membro da administração.</p>
            </div>
            <?php } ?>
            <?php if( $msgSuccess != '' ){ ?>
            <div class="alert alert-success alert-dismissible" style="margin:10px">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <p><?php echo htmlspecialchars( $msgSuccess, ENT_COMPAT, 'UTF-8', FALSE ); ?> Clique <a href="/admin/log/records/<?php echo htmlspecialchars( $user["id_user"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">aqui</a> para verificar seus registros.</p>
            </div>
            <?php } ?>

            <form role="form" action="/admin/log/out/<?php echo htmlspecialchars( $user["id_user"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
              <div class="card-body">

                <div class="form-group">
                  <label>Nome</label>
                  <input type="text" class="form-control" value="<?php echo htmlspecialchars( $user["des_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled>
                </div>

                <div class="form-group">
                  <label>Tipo</label>

                  <div class="radio">
                    <label><input type="radio" name="des_type" value="Regular" checked> Regular</label>
                  </div>

                  <div class="radio">
                    <label><input type="radio" name="des_type" value="Almoço" disabled> Almoço</label>
                  </div>

                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Registrar Saída</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>