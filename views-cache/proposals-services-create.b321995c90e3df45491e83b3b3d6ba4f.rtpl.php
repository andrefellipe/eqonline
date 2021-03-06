<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cadastrar Serviço</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/proposals">Propostas</a></li>
            <li class="breadcrumb-item"><a href="/admin/proposals/services">Preços de Serviços</a></li>
            <li class="breadcrumb-item active">Cadastrar Serviço</li>
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

            <form role="form" action="/admin/proposals/services/create" method="post">
              <div class="card-body">

                <div class="form-group">
                  <label>Descrição</label>
                  <input type="text" class="form-control" name="des_description" placeholder="Descreva o serviço">
                </div>

                <div class="form-group">
                  <label>Unidade de Medida</label>
                  <input type="text" class="form-control" name="des_unit" placeholder="Digite a unidade de medida do preço">
                </div>

                <div class="form-group">
                  <label>Preço (R$)</label>
                  <input type="text" class="form-control" name="vl_price" placeholder="Digite o preço do serviço">
                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cadastrar Serviço</button>
              </div>

            </form>
          </div>
        </div>
      </div>

    </div>
  </section>
</div>