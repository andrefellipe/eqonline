<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Gerar OS</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/orders">Ordens de Serviço</a></li>
            <li class="breadcrumb-item active">Gerar OS</li>
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

            <form role="form" action="/admin/orders/<?php echo htmlspecialchars( $order["id_order"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/generate" method="post">
              <div class="card-body">

                <div class="form-group">
                  <label>Código da OS</label>
                  <input type="text" class="form-control" name="id_order" value="<?php echo htmlspecialchars( $order["id_order"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Nome/Razão Social</label>
                  <input type="text" class="form-control" name="des_client_name" value="<?php echo htmlspecialchars( $client["des_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                </div>

                <div class="form-group">
                  <label>CPF/CNPJ</label>
                  <input type="text" class="form-control" name="des_CPF" value="<?php echo htmlspecialchars( $client["des_CPF"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Endereço</label>
                  <input type="text" class="form-control" name="des_address" value="<?php echo htmlspecialchars( $client["des_address"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Bairro</label>
                  <input type="text" class="form-control" name="des_neighborhood" value="<?php echo htmlspecialchars( $client["des_neighborhood"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Cidade/Estado</label>
                  <input type="text" class="form-control" name="des_city_state" value="<?php echo htmlspecialchars( $client["des_city_state"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                </div>

                <div class="form-group">
                  <label>CEP</label>
                  <input type="text" class="form-control" name="des_CEP" value="<?php echo htmlspecialchars( $client["des_CEP"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Celular</label>
                  <input type="text" class="form-control" name="des_phone" value="<?php echo htmlspecialchars( $client["des_phone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Telefone</label>
                  <input type="text" class="form-control" name="des_cel_phone" value="<?php echo htmlspecialchars( $client["des_cel_phone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Descrição</label>
                  <input type="text" class="form-control" name="des_description" placeholder="Descreva o serviço" value="<?php echo htmlspecialchars( $order["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Equipamento</label>
                  <input type="text" class="form-control" name="des_equipament" value="<?php echo htmlspecialchars( $order["des_equipament"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Modelo</label>
                  <input type="text" class="form-control" name="des_model" value="<?php echo htmlspecialchars( $order["des_model"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Número de Série</label>
                  <input type="text" class="form-control" name="des_number" value="<?php echo htmlspecialchars( $order["des_number"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Solicitante</label>
                  <input type="text" class="form-control" name="des_solicitor" value="<?php echo htmlspecialchars( $order["des_solicitor"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Solicitado</label>
                  <input type="date" class="form-control" name="dt_start" value="<?php echo htmlspecialchars( $order["dt_start"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly />
                </div>

                <div class="form-group">
                  <label>Atendido</label>
                  <input type="date" class="form-control" name="dt_finish" value="<?php echo htmlspecialchars( $order["dt_finish"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly />
                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Gerar OS</button>
              </div>

            </form>

          </div>
        </div>
      </div>

    </div>

  </section>

</div>