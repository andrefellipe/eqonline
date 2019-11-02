<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Editar Vistoria</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/warehouse/toolboxes">Maletas</a></li>
            <li class="breadcrumb-item"><a href="/admin/warehouse/toolboxes/1">Maleta 317</a></li>
            <li class="breadcrumb-item"><a href="/admin/warehouse/toolboxes/1/inspections">Vistorias</a></li>
            <li class="breadcrumb-item active">Editar Vistoria</li>
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

            <form role="form">
              <div class="card-body">

                <div class="form-group">
                  <label>Data</label>
                  <input type="date" class="form-control" />
                </div>

                <div class="form-group">
                  <label>Código</label>
                  <input type="text" class="form-control" disabled>
                </div>

                <div class="form-group">
                  <label>Responsável</label>
                  <input type="text" class="form-control" disabled>
                </div>

                <div class="form-group">
                  <label>Checklist de Ferramentas</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <input type="checkbox">
                      </span>
                    </div>
                    <input type="text" class="form-control" disabled>
                    <input type="text" class="form-control" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <label>Observações</label>
                  <input type="text" class="form-control">
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