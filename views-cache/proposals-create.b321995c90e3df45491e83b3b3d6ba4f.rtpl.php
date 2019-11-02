<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cadastrar Proposta</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/proposals">Propostas</a></li>
            <li class="breadcrumb-item active">Cadastrar Proposta</li>
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

            <form role="form" action="/admin/proposals/create" method="post">
              <div class="card-body">

                <div class="form-group">
                  <label>Cliente</label>
                  <select class="form-control select2" name="des_client_name" style="width: 100%">
                    <?php $counter1=-1;  if( isset($clients) && ( is_array($clients) || $clients instanceof Traversable ) && sizeof($clients) ) foreach( $clients as $key1 => $value1 ){ $counter1++; ?>
                    <option><?php echo htmlspecialchars( $value1["des_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Serviço</label>
                  <input type="text" class="form-control" name="des_service" placeholder="Descreva o serviço correspondente a essa proposta" required>
                </div>

                <div class="form-group">
                  <label>Data da Visita</label>
                  <input type="date" class="form-control" name="dt_visit" required />
                </div>

                <div class="form-group">
                  <label>Data de Emissão</label>
                  <input type="date" class="form-control" name="dt_emission" required />
                </div>

                <label>Lista de Materiais</label>

                <div class="form-group">
                  <div class="table-responsive">
                    <table class="table table-bordered materialColor" id="products_form">

                      <tr>
                        <td>
                          <select name="des_products_description[]" class="form-control products_select" style="width: 100%">
                            <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
                            <option><?php echo htmlspecialchars( $value1["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td><input type="text" name="qtd_material[]" placeholder="Quantidade" class="form-control" required /></td>
                        <td><button type="button" name="addProduct" id="addProduct" class="btn btn-success">Adicionar</button></td>
                      </tr>

                    </table>  
                  </div>
                </div>

                <label>Lista de Serviços</label>

                <div class="form-group">
                  <div class="table-responsive">
                    <table class="table table-bordered serviceColor" id="services_form">

                      <tr>
                        <td>
                          <select name="des_services_description[]" class="form-control services_select" style="width: 100%">
                            <?php $counter1=-1;  if( isset($services) && ( is_array($services) || $services instanceof Traversable ) && sizeof($services) ) foreach( $services as $key1 => $value1 ){ $counter1++; ?>
                            <option><?php echo htmlspecialchars( $value1["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td><input type="text" name="qtd_service[]" placeholder="Quantidade" class="form-control" required/></td>
                        <td><button type="button" name="addService" id="addService" class="btn btn-success">Adicionar</button></td>
                      </tr>

                    </table>  
                  </div>
                </div>

                <div class="form-group">
                  <label>Total de Material (R$)</label>
                  <input type="text" class="form-control" name="vl_material" readonly>
                </div>

                <div class="form-group">
                  <label>Total de Serviço (R$)</label>
                  <input type="text" class="form-control" name="vl_service" readonly>
                </div>

                <div class="form-group">
                  <label>Fator de Compra (%)</label>
                  <input type="text" class="form-control" name="fct_buy" placeholder="Defina o fator de compra" required>
                </div>

                <div class="form-group">
                  <label>Fator de Risco (%)</label>
                  <input type="text" class="form-control" name="fct_risk" placeholder="Defina o fator de risco" required>
                </div>

                <div class="form-group">
                  <label>Total de Material com Fator de Compra (R$)</label>
                  <input type="text" class="form-control" name="vl_material_buy" readonly>
                </div>

                <div class="form-group">
                  <label>Total de Serviço com Fator de Risco (R$)</label>
                  <input type="text" class="form-control" name="vl_service_risk" readonly>
                </div>

                <div class="form-group">
                  <label>Total no Horário Comercial (R$)</label>
                  <input type="text" class="form-control" name="vl_price_commercial" readonly>
                </div>

                <div class="form-group">
                  <label>Total no Horário Não-Comercial (R$)</label>
                  <input type="text" class="form-control" name="vl_price_non_commercial" readonly>
                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cadastrar Proposta</button>
              </div>

            </form>

          </div>
        </div>
      </div>

    </div>

  </section>

</div>