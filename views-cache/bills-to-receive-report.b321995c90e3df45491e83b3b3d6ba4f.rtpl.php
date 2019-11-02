<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Gerar Relatório</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/bills/to-receive">Contas a Receber</a></li>
            <li class="breadcrumb-item active">Gerar Relatório</li>
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

            <form role="form" action="/admin/bills/to-receive/report" method="post">
              <div class="card-body">

                <div class="form-group">
                  <label>Início</label>
                  <input type="date" class="form-control" name="dt_rstart" required />
                </div>

                <div class="form-group">
                  <label>Fim</label>
                  <input type="date" class="form-control" name="dt_rfinish" required />
                </div>

                <div class="form-group">
                  <label>Cliente</label>
                  <select class="form-control select2" name="des_description" style="width: 100%">
                    <option>Total</option>
                    <?php $counter1=-1;  if( isset($clients) && ( is_array($clients) || $clients instanceof Traversable ) && sizeof($clients) ) foreach( $clients as $key1 => $value1 ){ $counter1++; ?>
                    <option><?php echo htmlspecialchars( $value1["des_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                    <?php } ?>
                  </select>
                </div>
                
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Gerar Relatório</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>