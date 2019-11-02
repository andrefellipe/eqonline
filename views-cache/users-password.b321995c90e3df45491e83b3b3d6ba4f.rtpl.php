<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Alterar Senha</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/users">Usuários</a></li>
            <li class="breadcrumb-item active">Alterar Senha</li>
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
              <p><?php echo htmlspecialchars( $msgError, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
            </div>
            <?php } ?>
            <?php if( $msgSuccess != '' ){ ?>
            <div class="alert alert-success alert-dismissible" style="margin:10px">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <p><?php echo htmlspecialchars( $msgSuccess, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
            </div>
            <?php } ?>
          
          <form role="form" action="/admin/users/<?php echo htmlspecialchars( $user["id_user"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/password" method="post">
            <div class="card-body">

              <div class="form-group">
                <label>Nova Senha</label>
                <input type="password" class="form-control" id="des_password" name="des_password" placeholder="Nova senha">
              </div>

              <div class="form-group">
                <label>Confirme a senha</label>
                <input type="password" class="form-control" id="des_password-confirm" name="des_password-confirm" placeholder="Confirme a nova senha">
              </div>

            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Alterar Senha</button>
            </div>

          </form>

        </div>

      </div>

    </div>
  </div>

</section>

</div>