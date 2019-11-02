<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cadastrar Vistoria</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/transport/vehicles">Veículos</a></li>
            <li class="breadcrumb-item"><a href="/admin/transport/vehicles/<?php echo htmlspecialchars( $vehicle["id_vehicle"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $vehicle["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
            <li class="breadcrumb-item"><a href="/admin/transport/vehicles/<?php echo htmlspecialchars( $vehicle["id_vehicle"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/inspections">Vistorias</a></li>
            <li class="breadcrumb-item active">Cadastrar Vistoria</li>
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
            
            <form role="form" action="/admin/transport/vehicles/<?php echo htmlspecialchars( $vehicle["id_vehicle"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/inspections/create" method="post">
              <div class="card-body">

                <div class="form-group">
                  <label>Data</label>
                  <input type="date" class="form-control" name="dt_insp" required />
                </div>

                <div class="form-group">
                  <label>Código do Veículo</label>
                  <input type="text" class="form-control" name="id_vehicle" value="<?php echo htmlspecialchars( $vehicle["id_vehicle"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Veículo</label>
                  <input type="text" class="form-control" name="des_description" value="<?php echo htmlspecialchars( $vehicle["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Número de Ferramentas</label>
                  <input type="text" class="form-control" name="num_tools" value="<?php echo htmlspecialchars( $num_tools, ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Checklist de Ferramentas</label>

                  <?php $counter1=-1;  if( isset($tools) && ( is_array($tools) || $tools instanceof Traversable ) && sizeof($tools) ) foreach( $tools as $key1 => $value1 ){ $counter1++; ?>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <input type="checkbox" name="tool_verification[]">
                      </span>
                    </div>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars( $value1["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                    <input type="text" class="form-control" value="<?php echo formatPriceComma($value1["qtd"]); ?>" readonly>
                  </div>
                  <?php } ?>

                </div>

                <div class="form-group">
                  <label>Observações</label>
                  <input type="text" class="form-control" name="des_obs">
                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>