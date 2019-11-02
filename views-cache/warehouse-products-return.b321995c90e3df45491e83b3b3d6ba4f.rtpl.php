<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Retornos</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/warehouse/products">Produtos</a></li>
            <li class="breadcrumb-item active">Retornos</li>
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

            <form role="form" action="/admin/warehouse/products/return" method="post">
              <div class="card-body">

                <div class="form-group">
                  <label>Data</label>
                  <input type="date" class="form-control" name="dt" required />
                </div>

                <div class="form-group">
                  <label>Produto</label>
                  <select class="form-control select2" name="des_description" style="width: 100%;">
                    <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
                    <option><?php echo htmlspecialchars( $value1["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Quantidade</label>
                  <input type="text" class="form-control" name="qtd" required placeholder="Insira a quantidade">
                </div>

                <div class="form-group">
                  <label>Destino</label>
                  <input type="text" class="form-control" name="des_destination" value="Almoxarifado" readonly>
                </div>

                <div class="form-group">
                  <label>Origem</label>
                  <select class="form-control select2" name="des_origin" style="width: 100%;">
                    <?php $counter1=-1;  if( isset($orders) && ( is_array($orders) || $orders instanceof Traversable ) && sizeof($orders) ) foreach( $orders as $key1 => $value1 ){ $counter1++; ?>
                    <option><?php echo htmlspecialchars( $value1["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                    <?php } ?>
                    <?php $counter1=-1;  if( isset($vehicles) && ( is_array($vehicles) || $vehicles instanceof Traversable ) && sizeof($vehicles) ) foreach( $vehicles as $key1 => $value1 ){ $counter1++; ?>
                    <option><?php echo htmlspecialchars( $value1["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                    <?php } ?>
                    <?php $counter1=-1;  if( isset($toolboxes) && ( is_array($toolboxes) || $toolboxes instanceof Traversable ) && sizeof($toolboxes) ) foreach( $toolboxes as $key1 => $value1 ){ $counter1++; ?>
                    <option><?php echo htmlspecialchars( $value1["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                    <?php } ?>
                    <option>E&Q</option>
                  </select>
                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Registrar Retorno</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>