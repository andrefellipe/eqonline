<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Gerar Proposta</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/proposals">Propostas</a></li>
            <li class="breadcrumb-item active">Gerar Proposta</li>
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

            <form role="form" action="/admin/proposals/<?php echo htmlspecialchars( $proposal["id_proposal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/generate" method="post">
              <div class="card-body">

                <div class="form-group">
                  <label>Código da Proposta</label>
                  <input type="text" class="form-control" name="id_proposal" value="<?php echo htmlspecialchars( $proposal["id_proposal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Data de Emissão</label>
                  <input type="date" class="form-control" name="dt_emission" required />
                </div>

                <div class="form-group">
                  <label>Destinatário</label>
                  <input type="text" class="form-control" name="des_destination" required>
                </div>

                <div class="form-group">
                  <label>Contato</label>
                  <input type="text" class="form-control" name="des_contact" required>
                </div>

                <div class="form-group">
                  <label>Saudação</label>
                  <input type="text" class="form-control" name="des_salutation" required>
                </div>

                <div class="form-group">
                  <label>Introdução</label>
                  <input type="text" class="form-control" name="des_introduction" required>
                </div>

                <div class="form-group">
                  <label>Total da Cotação</label>
                  <input type="text" class="form-control" name="vl_price" required>
                </div>

                <div class="form-group">
                  <label>Horário</label>
                  <input type="text" class="form-control" name="des_schedule" required>
                </div>

                <div class="form-group">
                  <label>Valor da Proposta</label>
                  <input type="text" class="form-control" name="des_price" required>
                </div>

                <div class="form-group">
                  <label>Validade da Proposta</label>
                  <input type="text" class="form-control" name="des_proposal_validity" required>
                </div>

                <div class="form-group">
                  <label>Garantia</label>
                  <input type="text" class="form-control" name="des_warranty" required>
                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Gerar Proposta</button>
              </div>

            </form>

          </div>
        </div>
      </div>

    </div>

  </section>

</div>