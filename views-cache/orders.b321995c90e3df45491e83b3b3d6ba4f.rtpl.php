<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Ordens de Serviço</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item active">Ordens de Serviço</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">

          <div class="card-header">
            <a href="/admin/orders/create" class="btn btn-success">Cadastrar Ordem de Serviço</a>
          </div>

          <?php if( $msgError != '' ){ ?>
          <div class="alert alert-danger alert-dismissible" style="margin:10px">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <p><?php echo htmlspecialchars( $msgError, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
          </div>
          <?php } ?>
          <?php if( $msgSuccess != '' ){ ?>
          <div class="alert alert-info alert-dismissible" style="margin:10px">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <p><?php echo htmlspecialchars( $msgSuccess, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
          </div>
          <?php } ?>

          <div class="card-body table-responsive">
            <table id="search-table" class="table table-bordered table-striped">

              <thead>
                <tr>
                  <th>Nº</th>
                  <th>Descrição</th>
                  <th>Cliente</th>
                  <th>Data</th>
                  <th>Status</th>
                  <th>Opções</th>
                </tr>
              </thead>

              <tbody>

                <?php $counter1=-1;  if( isset($orders) && ( is_array($orders) || $orders instanceof Traversable ) && sizeof($orders) ) foreach( $orders as $key1 => $value1 ){ $counter1++; ?>
                <tr>
                  <td><?php echo htmlspecialchars( $value1["id_order"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["des_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["dt_start"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["des_category"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td>
                    <a href="/admin/orders/<?php echo htmlspecialchars( $value1["id_order"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
                    <a href="/admin/orders/<?php echo htmlspecialchars( $value1["id_order"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir esta ordem de serviço?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Excluir</a>
                    <a href="/admin/orders/<?php echo htmlspecialchars( $value1["id_order"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/generate" class="btn btn-default btn-sm"><i class="fa fa-file-pdf"></i> Gerar OS</a>
                    <a href="/admin/orders/<?php echo htmlspecialchars( $value1["id_order"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/list" class="btn btn-default btn-sm"><i class="fa fa-file-pdf"></i> Material</a>
                  </td>
                </tr>
                <?php } ?>

              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>