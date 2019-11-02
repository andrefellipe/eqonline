<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Meus Registros</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/log/register">Ponto</a></li>
            <li class="breadcrumb-item"><a href="/admin/log/records">Registros</a></li>
            <li class="breadcrumb-item active">Meus Registros</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">

          <div class="card-body table-responsive">
            <table id="search-table" class="table table-bordered table-striped">

              <thead>
                <tr>
                  <th>Nº</th>
                  <th>Entrada</th>
                  <th>Saída</th>
                  <th>Tipo</th>
                </tr>
              </thead>

              <tbody>

                <?php $counter1=-1;  if( isset($records) && ( is_array($records) || $records instanceof Traversable ) && sizeof($records) ) foreach( $records as $key1 => $value1 ){ $counter1++; ?>
                <tr>
                  <td><?php echo htmlspecialchars( $value1["id_record"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["dt_start"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["dt_finish"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["des_type"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
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