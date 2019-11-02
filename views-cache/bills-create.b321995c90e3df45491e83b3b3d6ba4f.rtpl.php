<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cadastrar Conta</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/bills">Contas</a></li>
            <li class="breadcrumb-item active">Cadastrar Conta</li>
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
                  <label>Fornecedor/Cliente</label>
                  <select class="form-control select2">
                    <option>André Fellipe da Silva</option>
                    <option>Evolux</option>
                    <option>Nordestão</option>
                    <option>COSERN</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Data de Entrada</label>
                  <input type="date" class="form-control" />
                </div>

                <div class="form-group">
                  <label>Data de Vencimento</label>
                  <input type="date" class="form-control" />
                </div>

                <div class="form-group">
                  <label>Conta Contábil</label>
                  <select class="form-control select2">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Descrição</label>
                  <input type="text" class="form-control" placeholder="Descreva a conta">
                </div>

                <div class="form-group">
                  <label>Preço (R$)</label>
                  <input type="text" class="form-control" placeholder="Insira o preço em reais">
                </div>

                <div class="form-group">
                  <label>Status</label>

                  <div class="radio">
                    <label><input type="radio" name="log-type" checked> A Pagar</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="log-type"> Paga</label>
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
  </div>
</section>