<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Editar Abastecimento</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/transport/refuels">Abastecimentos</a></li>
            <li class="breadcrumb-item active">Editar Abastecimento</li>
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

            <form role="form" action="/admin/transport/refuels/<?php echo htmlspecialchars( $refuel["id_refuel"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">

              <div class="card-body">

                <div class="form-group">
                  <label>Motorista</label>
                  <select class="form-control select2" name="des_user_name" style="width: 100%">
                    <?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>
                    <option <?php if( $value1["des_name"] == $refuel["des_user_name"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["des_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Data do Abastecimento</label>
                  <input type="date" class="form-control" name="dt_travel" value="<?php echo htmlspecialchars( $refuel["dt_travel"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required />
                </div>

                <div class="form-group">
                  <label>Descrição do Veículo</label>
                  <select class="form-control select2" name="des_description" style="width: 100%">
                    <?php $counter1=-1;  if( isset($vehicles) && ( is_array($vehicles) || $vehicles instanceof Traversable ) && sizeof($vehicles) ) foreach( $vehicles as $key1 => $value1 ){ $counter1++; ?>
                    <option <?php if( $value1["des_description"] == $refuel["des_description"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                    <?php } ?>
                  </select>
                </div>
                
                <div class="form-group">
                  <label>Hora de Saída</label>
                  <input type="time" class="form-control" name="hr_out" value="<?php echo htmlspecialchars( $refuel["hr_out"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"/>
                </div>

                <div class="form-group">
                  <label>Hora de Chegada</label>
                  <input type="time" class="form-control" name="hr_in" value="<?php echo htmlspecialchars( $refuel["hr_in"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"/>
                </div>

                <div class="form-group">
                  <label>Quilometragem Anterior</label>
                  <input type="text" class="form-control" name="des_km_out" value="<?php echo formatPriceComma($refuel["des_km_out"]); ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Quilometragem</label>
                  <input type="text" class="form-control" name="des_km_in" placeholder="Digite a quilometragem do veículo no instante de chegada" value="<?php echo formatPriceComma($refuel["des_km_in"]); ?>">
                </div>

                <div class="form-group">
                  <label>Fornecedor</label>
                  <select class="form-control select2" name="des_supplier_name">
                    <?php $counter1=-1;  if( isset($suppliers) && ( is_array($suppliers) || $suppliers instanceof Traversable ) && sizeof($suppliers) ) foreach( $suppliers as $key1 => $value1 ){ $counter1++; ?>
                    <option <?php if( $value1["des_name"] == $refuel["des_supplier_name"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["des_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Quantidade de Combustível (Litros)</label>
                  <input type="text" class="form-control" name="qtd_fuel" placeholder="Digite quantos litros de combustível foram abastecidos" value="<?php echo formatPriceComma($refuel["qtd_fuel"]); ?>">
                </div>

                <div class="form-group">
                  <label>Preço do Litro de Combustível (R$)</label>
                  <input type="text" class="form-control" name="vl_fuel" placeholder="Digite o preço do litro de combustível" value="<?php echo formatPriceComma($refuel["vl_fuel"]); ?>">
                </div>

                <div class="form-group">
                  <label>Valor Total (R$)</label>
                  <input type="text" class="form-control" name="vl_total" placeholder="Digite o valor total do abastecimento" value="<?php echo formatPriceComma($refuel["vl_total"]); ?>">
                </div>

                <div class="form-group">
                  <label>Número da Nota Fiscal</label>
                  <input type="text" class="form-control" name="nr_fiscal" placeholder="Digite o número da nota fiscal" value="<?php echo htmlspecialchars( $refuel["nr_fiscal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Observações</label>
                  <input type="text" class="form-control" name="des_obs" placeholder="Descreva outros detalhes que achar conveniente (multa, problemas no veículo, etc)" value="<?php echo htmlspecialchars( $refuel["des_obs"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
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