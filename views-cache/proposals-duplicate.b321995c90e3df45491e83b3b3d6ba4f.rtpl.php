<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Duplicar Proposta</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/proposals">Propostas</a></li>
            <li class="breadcrumb-item active">Duplicar Proposta</li>
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
                  <select class="form-control select2" name="des_client_name" style="width: 100%;" >
                    <?php $counter1=-1;  if( isset($clients) && ( is_array($clients) || $clients instanceof Traversable ) && sizeof($clients) ) foreach( $clients as $key1 => $value1 ){ $counter1++; ?>
                    <option <?php if( $value1["des_name"] == $proposal["des_client_name"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["des_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Serviço</label>
                  <input type="text" class="form-control" name="des_service" value="<?php echo htmlspecialchars( $proposal["des_service"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Descreva o serviço correspondente a essa proposta" required>
                </div>

                <div class="form-group">
                  <label>Data da Visita</label>
                  <input type="date" class="form-control" name="dt_visit" value="<?php echo htmlspecialchars( $proposal["dt_visit"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required />
                </div>

                <div class="form-group">
                  <label>Data de Emissão</label>
                  <input type="date" class="form-control" name="dt_emission" value="<?php echo htmlspecialchars( $proposal["dt_emission"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required />
                </div>

                <label>Lista de Materiais (Produto | Preço de Venda (R$) | Quantidade)</label>

                <div class="form-group">
                  <div class="table-responsive">
                    <table class="table table-bordered materialColor" id="products_form">
                      <?php if( $materialEmpty == 1 ){ ?>
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
                      <?php } ?>

                      <?php $counter1=-1;  if( isset($materials) && ( is_array($materials) || $materials instanceof Traversable ) && sizeof($materials) ) foreach( $materials as $key1 => $value1 ){ $counter1++; ?>
                      <?php if( $counter1 == 0 ){ ?>
                      <tr>
                        <td>
                          <?php $product_name = $value1["des_products_description"]; ?>
                          <select name="des_products_description[]" class="form-control products_select" style="width: 100%">
                            <?php $counter2=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key2 => $value2 ){ $counter2++; ?>
                            <option <?php if( $value2["des_description"] == $product_name ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value2["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td><input type="text" class="form-control" value="<?php echo formatPriceComma($value1["vl_sell_price"]); ?>" readonly /></td>
                        <td><input type="text" name="qtd_material[]" placeholder="Quantidade" class="form-control" value="<?php echo formatPriceComma($value1["qtd_material"]); ?>" required /></td>
                        <td><button type="button" name="addProduct" id="addProduct" class="btn btn-success">Adicionar</button></td>
                      </tr>
                      <?php }else{ ?>
                      <tr>
                        <td>
                          <?php $product_name = $value1["des_products_description"]; ?>
                          <select name="des_products_description[]" class="form-control products_select" style="width: 100%">
                            <?php $counter2=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key2 => $value2 ){ $counter2++; ?>
                            <option <?php if( $value2["des_description"] == $product_name ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value2["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                            <?php } ?>
                          </select>
                        </td>
                        <td><input type="text" class="form-control" value="<?php echo formatPriceComma($value1["vl_sell_price"]); ?>" readonly /></td>
                        <td><input type="text" name="qtd_material[]" placeholder="Quantidade" class="form-control" value="<?php echo formatPriceComma($value1["qtd_material"]); ?>" required /></td>
                        <td><button type="button" name="remove" id="<?php echo htmlspecialchars( $counter1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-danger btn_removeProduct"
                          onclick="return alert('Para excluir o material, basta alterar o campo Quantidade para 0.')">X</button></td>
                        </tr>
                        <?php } ?>
                        <?php } ?>
                      </table>
                    </div>
                  </div>

                  <label>Lista de Serviços (Serviço | Preço (R$) | Quantidade)</label>

                  <div class="form-group">
                    <div class="table-responsive">
                      <table class="table table-bordered serviceColor" id="services_form">

                        <?php if( $serviceEmpty == 1 ){ ?>
                        <tr>
                          <td>
                            <select name="des_services_description[]" class="form-control services_select" style="width: 100%">
                              <?php $counter1=-1;  if( isset($services) && ( is_array($services) || $services instanceof Traversable ) && sizeof($services) ) foreach( $services as $key1 => $value1 ){ $counter1++; ?>
                              <option><?php echo htmlspecialchars( $value1["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                              <?php } ?>
                            </select>
                          </td>
                          <td><input type="text" name="qtd_service[]" placeholder="Quantidade" class="form-control" required /></td>
                          <td><button type="button" name="addService" id="addService" class="btn btn-success">Adicionar</button></td>
                        </tr>
                        <?php } ?>

                        <?php $counter1=-1;  if( isset($servicesp) && ( is_array($servicesp) || $servicesp instanceof Traversable ) && sizeof($servicesp) ) foreach( $servicesp as $key1 => $value1 ){ $counter1++; ?>
                        <?php if( $counter1 == 0 ){ ?>
                        <tr>
                          <td>
                            <?php $service_name = $value1["des_services_description"]; ?>
                            <select name="des_services_description[]" class="form-control services_select" style="width: 100%">
                              <?php $counter2=-1;  if( isset($services) && ( is_array($services) || $services instanceof Traversable ) && sizeof($services) ) foreach( $services as $key2 => $value2 ){ $counter2++; ?>
                              <option <?php if( $value2["des_description"] == $service_name ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value2["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                              <?php } ?>
                            </select>
                          </td>
                          <td><input type="text" class="form-control" value="<?php echo formatPriceComma($value1["vl_price"]); ?>" readonly /></td>
                          <td><input type="text" name="qtd_service[]" placeholder="Quantidade" class="form-control" value="<?php echo formatPriceComma($value1["qtd_service"]); ?>" required /></td>
                          <td><button type="button" name="addService" id="addService" class="btn btn-success">Adicionar</button></td>
                        </tr>
                        <?php }else{ ?>
                        <tr>
                          <td>
                            <?php $service_name = $value1["des_services_description"]; ?>
                            <select name="des_services_description[]" class="form-control services_select" style="width: 100%">
                              <?php $counter2=-1;  if( isset($services) && ( is_array($services) || $services instanceof Traversable ) && sizeof($services) ) foreach( $services as $key2 => $value2 ){ $counter2++; ?>
                              <option <?php if( $value2["des_description"] == $service_name ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value2["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                              <?php } ?>
                            </select>
                          </td>
                          <td><input type="text" class="form-control" value="<?php echo formatPriceComma($value1["vl_price"]); ?>" readonly /></td>
                          <td><input type="text" name="qtd_service[]" placeholder="Quantidade" class="form-control" value="<?php echo formatPriceComma($value1["qtd_service"]); ?>" required /></td>
                          <td><button type="button" name="remove" id="<?php echo htmlspecialchars( $counter1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-danger btn_removeService"
                            onclick="return alert('Para excluir o serviço, basta alterar o campo Quantidade para 0.')">X</button></td>
                          </tr>
                          <?php } ?>
                          <?php } ?>
                        </table>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Total de Material (R$)</label>
                      <input type="text" class="form-control" name="vl_material" value="<?php echo formatPriceComma($proposal["vl_material"]); ?>" readonly>
                    </div>

                    <div class="form-group">
                      <label>Total de Serviço (R$)</label>
                      <input type="text" class="form-control" name="vl_service" value="<?php echo formatPriceComma($proposal["vl_service"]); ?>" readonly>
                    </div>

                    <div class="form-group">
                      <label>Fator de Compra (%)</label>
                      <input type="text" class="form-control" name="fct_buy" value="<?php echo formatPriceComma($proposal["fct_buy"]); ?>" placeholder="Defina o fator de compra" required>
                    </div>

                    <div class="form-group">
                      <label>Fator de Risco (%)</label>
                      <input type="text" class="form-control" name="fct_risk" value="<?php echo formatPriceComma($proposal["fct_risk"]); ?>" placeholder="Defina o fator de risco" required>
                    </div>

                    <div class="form-group">
                      <label>Total de Material com Fator de Compra (R$)</label>
                      <input type="text" class="form-control" name="vl_material_buy" value="<?php echo formatPriceComma($proposal["vl_material_buy"]); ?>" readonly>
                    </div>

                    <div class="form-group">
                      <label>Total de Serviço com Fator de Risco (R$)</label>
                      <input type="text" class="form-control" name="vl_service_risk" value="<?php echo formatPriceComma($proposal["vl_service_risk"]); ?>" readonly>
                    </div>

                    <div class="form-group">
                      <label>Total no Horário Comercial (R$)</label>
                      <input type="text" class="form-control" name="vl_price_commercial" value="<?php echo formatPriceComma($proposal["vl_price_commercial"]); ?>" readonly>
                    </div>

                    <div class="form-group">
                      <label>Total no Horário Não-Comercial (R$)</label>
                      <input type="text" class="form-control" name="vl_price_non_commercial" value="<?php echo formatPriceComma($proposal["vl_price_non_commercial"]); ?>" readonly>
                    </div>

                  </div>

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Salvar Nova Proposta</button>
                  </div>

                </form>

              </div>
            </div>
          </div>

        </div>

      </section>

    </div>