<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cadastrar Produto</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/warehouse/products">Produtos</a></li>
            <li class="breadcrumb-item active">Cadastrar Produto</li>
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

            <form role="form" action="/admin/warehouse/products/create" method="post">
              <div class="card-body">

                <div class="form-group">
                  <label>Descrição</label>
                  <input type="text" class="form-control" name="des_description" placeholder="Descreva o produto">
                </div>

                <div class="form-group">
                  <label>Unidade de Medida</label>
                  <input type="text" class="form-control" name="des_measure_unit" placeholder="Digite a unidade de medida do produto" maxlength="4">
                </div>

                <div class="form-group">
                  <label>Último Preço de Compra (R$)</label>
                  <input type="text" class="form-control" name="vl_purchase_price" placeholder="Digite o último preço de compra">
                </div>

                <div class="form-group">
                  <label>Estoque Mínimo do Produto</label>
                  <input type="text" class="form-control" name="des_min_storage_product" placeholder="Digite o estoque mínimo do produto">
                </div>

                <div class="form-group">
                  <label>Estoque Máximo do Produto</label>
                  <input type="text" class="form-control" name="des_max_storage_product" placeholder="Digite o estoque máximo do produto">
                </div>

                <div class="form-group">
                  <label>Localização</label>
                  <input type="text" class="form-control" name="des_location" placeholder="Digite o local onde o produto se encontra no almoxarifado">
                </div>

                <div class="form-group">
                  <label>Grupo</label>
                  <input type="text" class="form-control" name="des_group" placeholder="Digite o grupo que classifica o produto">
                </div>

                <div class="form-group">
                  <label>NCM</label>
                  <input type="text" class="form-control" name="des_NCM" placeholder="Digite o NCM do produto">
                </div>

                <div class="form-group">
                  <label>Unidade de Medida Reduzida</label>
                  <input type="text" class="form-control" name="des_reduced_measure_unit" placeholder="Digite a unidade de medida reduzida do produto">
                </div>
                
                <div class="form-group">
                  <label>Última Data de Cotação</label>
                  <input type="date" class="form-control" name="dt_last" />
                </div>

                <div class="form-group">
                  <label>Estoque</label>
                  <input type="text" class="form-control" name="qtd" placeholder="Digite a quantidade do produto em estoque">
                </div>

                <div class="form-group">
                  <label>Tipo</label>

                  <div class="radio">
                    <label><input type="radio" name="des_storage_product" value=1 checked> Produto do Almoxarifado</label>
                  </div>

                  <div class="radio">
                    <label><input type="radio" name="des_storage_product" value=0> Outro</label>
                  </div>

                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>