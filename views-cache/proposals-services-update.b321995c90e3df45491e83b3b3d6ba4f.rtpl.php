<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Editar Serviço</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/proposals">Propostas</a></li>
            <li class="breadcrumb-item"><a href="/admin/proposals/services">Preços de Serviços</a></li>
            <li class="breadcrumb-item active">Editar Serviço</li>
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

            <form role="form" action="/admin/proposals/services/<?php echo htmlspecialchars( $service["id_service"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
              <div class="card-body">

                <div class="form-group">
                  <label>Descrição</label>
                  <input type="text" class="form-control" name="des_description" placeholder="Descreva o serviço" value="<?php echo htmlspecialchars( $service["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Unidade de Medida</label>
                  <input type="text" class="form-control" name="des_unit" placeholder="Digite a unidade de medida do preço" value="<?php echo htmlspecialchars( $service["des_unit"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Preço (R$)</label>
                  <input type="text" class="form-control" name="vl_price" placeholder="Digite o preço do serviço" value="<?php echo formatPriceComma($service["vl_price"]); ?>">
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