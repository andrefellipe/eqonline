<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Editar Viagem</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/transport/travels">Viagens</a></li>
            <li class="breadcrumb-item active">Editar Viagem</li>
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

            <form role="form" action="/admin/transport/travels/<?php echo htmlspecialchars( $travel["id_travel"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
              <div class="card-body">
                
                <div class="form-group">
                  <label>Motorista</label>
                  <select class="form-control select2" name="des_name" style="width: 100%">
                    <?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>
                    <option <?php if( $value1["des_name"] == $travel["des_name"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["des_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Data da Viagem</label>
                  <input type="date" class="form-control" name="dt_travel" value="<?php echo htmlspecialchars( $travel["dt_travel"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"/>
                </div>

                <div class="form-group">
                  <label>Descrição do Veículo</label>
                  <select class="form-control select2" name="des_description" style="width: 100%">
                    <?php $counter1=-1;  if( isset($vehicles) && ( is_array($vehicles) || $vehicles instanceof Traversable ) && sizeof($vehicles) ) foreach( $vehicles as $key1 => $value1 ){ $counter1++; ?>
                    <option <?php if( $value1["des_description"] == $travel["des_description"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                    <?php } ?>
                  </select>
                </div>
                
                <div class="form-group">
                  <label>Hora de Saída</label>
                  <input type="time" class="form-control" name="hr_out" value="<?php echo htmlspecialchars( $travel["hr_out"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"/>
                </div>

                <div class="form-group">
                  <label>Hora de Chegada</label>
                  <input type="time" class="form-control" name="hr_in" value="<?php echo htmlspecialchars( $travel["hr_in"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"/>
                </div>

                <div class="form-group">
                  <label>Quilometragem de Saída</label>
                  <input type="text" class="form-control" name="des_km_out" placeholder="Digite a quilometragem do veículo no instante de saída" value="<?php echo formatPriceComma($travel["des_km_out"]); ?>">
                </div>

                <div class="form-group">
                  <label>Quilometragem de Chegada</label>
                  <input type="text" class="form-control" name="des_km_in" placeholder="Digite a quilometragem do veículo no instante de chegada" value="<?php echo formatPriceComma($travel["des_km_in"]); ?>">
                </div>

                <div class="form-group">
                  <label>Trajeto</label>
                  <input type="text" class="form-control" name="des_path" placeholder="Digite o trajeto realizado" value="<?php echo htmlspecialchars( $travel["des_path"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Objetivo</label>
                  <input type="text" class="form-control" name="des_goal" placeholder="Digite o objetivo da viagem" value="<?php echo htmlspecialchars( $travel["des_goal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Observações</label>
                  <input type="text" class="form-control" name="des_obs" placeholder="Descreva outros detalhes da viagem (multa, problemas no veículo, etc)" value="<?php echo htmlspecialchars( $travel["des_obs"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
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