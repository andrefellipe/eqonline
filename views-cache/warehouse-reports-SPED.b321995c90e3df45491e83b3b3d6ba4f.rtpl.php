<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>SPED</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/warehouse/reports">Relatórios</a></li>
            <li class="breadcrumb-item active">SPED</li>
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

            <form role="form" action="/admin/warehouse/reports/SPED" method="post">
              <div class="card-body">

                <div class="form-group">
                  <label>Data de Início</label>
                  <input type="date" class="form-control" name="dt_start" />
                </div>

                <div class="form-group">
                  <label>Data de Término</label>
                  <input type="date" class="form-control" name="dt_finish" />
                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary" onclick="return confirm('Deseja gerar o arquivo SPED?')">Gerar SPED</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>