<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Gerar Listas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/proposals">Propostas</a></li>
            <li class="breadcrumb-item active">Gerar Listas</li>
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

            <form role="form" action="/admin/proposals/<?php echo htmlspecialchars( $id_proposal, ENT_COMPAT, 'UTF-8', FALSE ); ?>/list" method="post">
              <div class="card-body">

                <div class="form-group">
                  <label>Nº da Proposta</label>
                  <input type="text" class="form-control" name="id_proposal" value="<?php echo htmlspecialchars( $id_proposal, ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Cliente</label>
                  <input type="text" class="form-control" name="des_client_name" value="<?php echo htmlspecialchars( $des_client_name, ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Serviço</label>
                  <input type="text" class="form-control" name="des_service" value="<?php echo htmlspecialchars( $des_service, ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Data de Emissão</label>
                  <input type="date" class="form-control" name="dt_emission" value="<?php echo htmlspecialchars( $dt_emission, ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Gerar Listas</button>
              </div>

            </form>

          </div>
        </div>
      </div>

    </div>

  </section>

</div>