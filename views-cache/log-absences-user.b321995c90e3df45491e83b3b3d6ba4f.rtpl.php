<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Minhas Faltas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/log/register">Ponto</a></li>
            <li class="breadcrumb-item"><a href="/admin/log/absences">Faltas</a></li>
            <li class="breadcrumb-item active">Minhas Faltas</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">

          <?php if( $msgError != '' ){ ?>
            <div class="alert alert-danger alert-dismissible" style="margin:10px">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <p><?php echo htmlspecialchars( $msgError, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
            </div>
            <?php } ?>
            <?php if( $msgSuccess != '' ){ ?>
            <div class="alert alert-success alert-dismissible" style="margin:10px">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <p><?php echo htmlspecialchars( $msgSuccess, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
            </div>
            <?php } ?>

          <div class="card-body table-responsive">
            <table id="search-table" class="table table-bordered table-striped">

              <thead>
                <tr>
                  <th>Nº</th>
                  <th>Data</th>
                  <th>Justificativa</th>
                </tr>
              </thead>

              <tbody>

                <?php $counter1=-1;  if( isset($absences) && ( is_array($absences) || $absences instanceof Traversable ) && sizeof($absences) ) foreach( $absences as $key1 => $value1 ){ $counter1++; ?>
                <tr>
                  <td><?php echo htmlspecialchars( $value1["id_absence"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["dt"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["des_justification"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
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