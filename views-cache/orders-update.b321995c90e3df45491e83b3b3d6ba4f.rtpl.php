<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Editar Ordem de Serviço</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/orders">Ordens de Serviço</a></li>
            <li class="breadcrumb-item active">Editar Ordem de Serviço</li>
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

            <form role="form" action="/admin/orders/<?php echo htmlspecialchars( $order["id_order"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
              <div class="card-body">

                <div class="form-group">
                  <label>Data de Abertura</label>
                  <input type="date" class="form-control" name="dt_start" value="<?php echo htmlspecialchars( $order["dt_start"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" />
                </div>

                <div class="form-group">
                  <label>Data de Atendimento</label>
                  <input type="date" class="form-control" name="dt_finish" value="<?php echo htmlspecialchars( $order["dt_finish"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" />
                </div>

                <div class="form-group">
                  <label>Cliente</label>
                  <select class="form-control select2" name="des_name" style="width: 100%">
                    <?php $counter1=-1;  if( isset($clients) && ( is_array($clients) || $clients instanceof Traversable ) && sizeof($clients) ) foreach( $clients as $key1 => $value1 ){ $counter1++; ?>
                    <option <?php if( $value1["des_name"] == $order["des_name"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["des_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Descrição</label>
                  <input type="text" class="form-control" name="des_description" placeholder="Descreva o serviço" value="<?php echo htmlspecialchars( $order["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Equipamento</label>
                  <input type="text" class="form-control" name="des_equipament" placeholder="" value="<?php echo htmlspecialchars( $order["des_equipament"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Modelo</label>
                  <input type="text" class="form-control" name="des_model" placeholder="" value="<?php echo htmlspecialchars( $order["des_model"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Número de Série</label>
                  <input type="text" class="form-control" name="des_number" placeholder="" value="<?php echo htmlspecialchars( $order["des_number"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Solicitante</label>
                  <input type="text" class="form-control" name="des_solicitor" placeholder="Digite o nome do solicitante" value="<?php echo htmlspecialchars( $order["des_solicitor"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Status</label>

                  <div class="radio">
                    <label><input type="radio" name="des_category" <?php if( $order["des_category"] == 'Ordem Aberta e Não-Confirmada' ){ ?>checked<?php } ?> value="Ordem Aberta e Não-Confirmada"> Ordem Aberta e Não-Confirmada</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="des_category" <?php if( $order["des_category"] == 'Ordem Aberta e Confirmada' ){ ?>checked<?php } ?> value="Ordem Aberta e Confirmada"> Ordem Aberta e Confirmada</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="des_category" <?php if( $order["des_category"] == 'Ordem Fechada' ){ ?>checked<?php } ?> value="Ordem Fechada"> Ordem Fechada</label>
                  </div>
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