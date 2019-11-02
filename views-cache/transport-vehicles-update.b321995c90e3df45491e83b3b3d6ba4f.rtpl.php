<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Editar Veículo</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/transport/vehicles">Veículos</a></li>
            <li class="breadcrumb-item active">Editar Veículo</li>
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

            <form role="form" action="/admin/transport/vehicles/<?php echo htmlspecialchars( $vehicle["id_vehicle"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
              <div class="card-body">

                <div class="form-group">
                  <label>Descrição</label>
                  <input type="text" class="form-control" name="des_description" placeholder="Digite uma descrição para o veículo" value="<?php echo htmlspecialchars( $vehicle["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Chassi</label>
                  <input type="text" class="form-control" name="des_chassi" placeholder="Digite o chassi do veículo" value="<?php echo htmlspecialchars( $vehicle["des_chassi"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Tipo</label>
                  <input type="text" class="form-control" name="des_type" placeholder="Digite o tipo (carro, moto etc)" value="<?php echo htmlspecialchars( $vehicle["des_type"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Combustível</label>
                  <input type="text" class="form-control" name="des_fuel" placeholder="Digite o tipo de combustível (gasolina, por exemplo)" value="<?php echo htmlspecialchars( $vehicle["des_fuel"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Data de Aquisição</label>
                  <input type="date" class="form-control" name="dt_purchase" value="<?php echo htmlspecialchars( $vehicle["dt_purchase"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"/>
                </div>

                <div class="form-group">
                  <label>Ano de Fabricação</label>
                  <input type="text" class="form-control" name="des_fabrication_year" placeholder="Digite o ano de fabricação" value="<?php echo htmlspecialchars( $vehicle["des_fabrication_year"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Placa</label>
                  <input type="text" class="form-control" name="des_plate" placeholder="Digite a placa do veículo" value="<?php echo htmlspecialchars( $vehicle["des_plate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Cor</label>
                  <input type="text" class="form-control" name="des_color" placeholder="Digite a cor do veículo" value="<?php echo htmlspecialchars( $vehicle["des_color"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Marca/Modelo</label>
                  <input type="text" class="form-control" name="des_model" placeholder="Digite a marca e o modelo do veículo" value="<?php echo htmlspecialchars( $vehicle["des_model"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>RENAVAM</label>
                  <input type="text" class="form-control" name="des_RENAVAM" placeholder="Digite o RENAVAM do veículo" value="<?php echo htmlspecialchars( $vehicle["des_RENAVAM"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
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