<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Abastecimentos</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item active">Abastecimentos</li>
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
          <a href="/admin/transport/fuel/create" class="btn btn-success">Cadastrar Abastecimento</a>
        </div>

        <div class="card-body table-responsive">
          <table id="search-table" class="table table-bordered table-striped">

            <thead>
              <tr>
                <th>Nº</th>
                <th>Data</th>
                <th>Descrição do veículo</th>
                <th>Fornecedor</th>
                <th>Opções</th>
              </tr>
            </thead>

            <tbody>
              
              <tr>
                  <td>1</td>
                  <td>2019-03-07</td>
                  <td>Carro de Sr. Fábio</td>
                  <td>Posto Mega Luz</td>
                  <td>
                    <a href="/admin/transport/fuel/1" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
                    <a href="/admin/transport/fuel/1/delete" onclick="return confirm('Deseja realmente excluir este abastecimento?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Excluir</a>
                  </td>
                </tr>

            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
</section>
</div>