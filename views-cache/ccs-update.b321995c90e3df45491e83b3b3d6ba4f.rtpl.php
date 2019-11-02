<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Editar Conta Contábil</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/bills/ccs">Contas Contábeis</a></li>
            <li class="breadcrumb-item active">Editar Conta Contábil</li>
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

            <form role="form" action="/admin/bills/ccs/<?php echo htmlspecialchars( $cc["id_CC"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
              <div class="card-body">

                <div class="form-group">
                  <label>Descrição</label>
                  <input type="text" class="form-control" name="des_description" placeholder="Descreva a conta contábil" value="<?php echo htmlspecialchars( $cc["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
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