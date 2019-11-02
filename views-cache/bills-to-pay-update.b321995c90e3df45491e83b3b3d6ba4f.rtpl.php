<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Editar Conta a Pagar</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/bills/to-pay">Contas a Pagar</a></li>
            <li class="breadcrumb-item active">Editar Conta a Pagar</li>
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

            <form role="form" action="/admin/bills/to-pay/<?php echo htmlspecialchars( $bill["id_bill"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
              <div class="card-body">

                <div class="form-group">
                  <label>Fornecedor</label>
                  <select class="form-control select2" name="des_supplier_name" style="width: 100%">
                    <?php $counter1=-1;  if( isset($suppliers) && ( is_array($suppliers) || $suppliers instanceof Traversable ) && sizeof($suppliers) ) foreach( $suppliers as $key1 => $value1 ){ $counter1++; ?>
                    <option <?php if( $value1["des_name"] == $bill["des_name"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["des_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>CPF/CNPJ</label>
                  <input type="text" class="form-control" value="<?php echo htmlspecialchars( $bill["des_CPF"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Data de Entrada</label>
                  <input type="date" class="form-control" name="dt_entry" value="<?php echo htmlspecialchars( $bill["dt_entry"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" />
                </div>

                <div class="form-group">
                  <label>Data de Vencimento</label>
                  <input type="date" class="form-control" name="dt_due" value="<?php echo htmlspecialchars( $bill["dt_due"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" />
                </div>

                <div class="form-group">
                  <label>Conta Contábil</label>
                  <select class="form-control select2" name="des_cc_description" style="width: 100%">
                    <?php $counter1=-1;  if( isset($ccs) && ( is_array($ccs) || $ccs instanceof Traversable ) && sizeof($ccs) ) foreach( $ccs as $key1 => $value1 ){ $counter1++; ?>
                    <option <?php if( $value1["des_description"] == $bill["des_cc_description"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Descrição</label>
                  <input type="text" class="form-control" name="des_description" placeholder="Descreva a conta" value="<?php echo htmlspecialchars( $bill["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Valor (R$)</label>
                  <input type="text" class="form-control" name="vl_total" placeholder="Insira o preço em reais" value="<?php echo formatPriceComma($bill["vl_total"]); ?>">
                </div>

                <div class="form-group">
                  <label>Centro de Custo</label>
                  <select class="form-control select2" name="des_center" style="width: 100%;">
                    <option>Avulso</option>
                    <?php $counter1=-1;  if( isset($orders) && ( is_array($orders) || $orders instanceof Traversable ) && sizeof($orders) ) foreach( $orders as $key1 => $value1 ){ $counter1++; ?>
                    <option <?php if( $value1["des_description"] == $bill["des_center"] ){ ?>selected<?php } ?>><?php echo htmlspecialchars( $value1["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Status</label>

                  <div class="radio">
                    <label><input type="radio" name="des_category" <?php if( $bill["des_category"] == 'A Pagar' ){ ?>checked<?php } ?> value="A Pagar"> A Pagar</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="des_category" <?php if( $bill["des_category"] == 'Paga' ){ ?>checked<?php } ?> value="Paga"> Paga</label>
                  </div>
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
  </div>
</section>