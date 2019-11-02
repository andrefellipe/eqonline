<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cadastrar Ordem de Serviço</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/orders">Ordens de Serviço</a></li>
            <li class="breadcrumb-item active">Cadastrar Ordem de Serviço</li>
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

            <form role="form" action="/admin/orders/create" method="post">
              <div class="card-body">

                <div class="form-group">
                  <label>Data de Abertura</label>
                  <input type="date" class="form-control" name="dt_start" />
                </div>

                <div class="form-group">
                  <label>Data de Atendimento</label>
                  <input type="date" class="form-control" name="dt_finish" />
                </div>

                <div class="form-group">
                  <label>Cliente</label>
                  <select class="form-control select2" name="des_name" style="width: 100%">
                    <?php $counter1=-1;  if( isset($clients) && ( is_array($clients) || $clients instanceof Traversable ) && sizeof($clients) ) foreach( $clients as $key1 => $value1 ){ $counter1++; ?>
                    <option><?php echo htmlspecialchars( $value1["des_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Descrição</label>
                  <input type="text" class="form-control" name="des_description" placeholder="Descreva o serviço">
                </div>

                <div class="form-group">
                  <label>Equipamento</label>
                  <input type="text" class="form-control" name="des_equipament" placeholder="">
                </div>

                <div class="form-group">
                  <label>Modelo</label>
                  <input type="text" class="form-control" name="des_model" placeholder="">
                </div>

                <div class="form-group">
                  <label>Número de Série</label>
                  <input type="text" class="form-control" name="des_number" placeholder="">
                </div>

                <div class="form-group">
                  <label>Solicitante</label>
                  <input type="text" class="form-control" name="des_solicitor" placeholder="Digite o nome do solicitante">
                </div>

                <div class="form-group">
                  <label>Status</label>

                  <div class="radio">
                    <label><input type="radio" name="des_category" value="Ordem Aberta e Não-Confirmada" checked> Ordem Aberta e Não-Confirmada</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="des_category" value="Ordem Aberta e Confirmada"> Ordem Aberta e Confirmada</label>
                  </div>
                  <label><input type="radio" name="des_category" value="Ordem Fechada"> Ordem Fechada</label>
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

<aside class="control-sidebar control-sidebar-dark">
  <div class="p-3">
      <!-- <h5>Title</h5>
        <p>Sidebar content</p> -->
      </div>
    </aside>