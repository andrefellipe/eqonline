<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Todos os Registros</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/log/register">Ponto</a></li>
            <li class="breadcrumb-item"><a href="/admin/log/records">Registros</a></li>
            <li class="breadcrumb-item active">Todos os Registros</li>
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
          <table id="all-records" class="table table-bordered table-striped">

            <thead>
              <tr>
                <th>Nome</th>
                <th>Entrada</th>
                <th>Saída</th>
                <th>Tipo</th>
                <th>Opções</th>
              </tr>
            </thead>

            <tbody>

              <tr>
                <td>André</td>
                <td>2019-02-20 08:10</td>
                <td>2019-02-20 18:10</td>
                <td>Regular</td>
                <td>
                  <a href="/admin/users/1/log/2/update" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
                  <a href="/admin/users/1/log/2/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Excluir</a>
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