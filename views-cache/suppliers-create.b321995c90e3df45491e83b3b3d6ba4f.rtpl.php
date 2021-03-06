<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cadastrar Fornecedor</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/suppliers">Fornecedores</a></li>
            <li class="breadcrumb-item active">Cadastrar Fornecedor</li>
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

            <form role="form" action="/admin/suppliers/create" method="post">
              <div class="card-body">

                <div class="form-group" >
                  <label>Nome/Razão Social</label>
                  <input type="text" class="form-control" name="des_name" placeholder="Digite o nome">
                </div>

                <div class="form-group">
                  <label>CPF/CNPJ</label>
                  <input type="text" class="form-control" name="des_CPF" placeholder="Digite o CPF ou o CNPJ">
                </div>

                <div class="form-group">
                  <label>Data de Cadastro</label>
                  <input type="date" class="form-control" name="dt_registration" />
                </div>

                <div class="form-group">
                  <label>Nome Fantasia</label>
                  <input type="text" class="form-control" name="des_fantasy" placeholder="Digite o nome fantasia">
                </div>

                <div class="form-group">
                  <label>Contato</label>
                  <input type="text" class="form-control" name="des_contact" placeholder="Nome do contato do fornecedor">
                </div>

                <div class="form-group">
                  <label>Inscrição Estadual</label>
                  <input type="text" class="form-control" name="des_state_nr" placeholder="Número da Inscrição Estadual">
                </div>

                <div class="form-group">
                  <label>Inscrição Municipal</label>
                  <input type="text" class="form-control" name="des_city_nr" placeholder="Número da Inscrição Municipal">
                </div>

                <div class="form-group">
                  <label>Endereço</label>
                  <input type="text" class="form-control" name="des_address" placeholder="Digite o endereço">
                </div>

                <div class="form-group">
                  <label>Bairro</label>
                  <input type="text" class="form-control" name="des_neighborhood" placeholder="Digite o bairro">
                </div>

                <div class="form-group">
                  <label>Cidade/Estado</label>
                  <input type="text" class="form-control" name="des_city_state" placeholder="Digite a cidade e o estado">
                </div>

                <div class="form-group">
                  <label>CEP</label>
                  <input type="text" class="form-control" name="des_CEP" placeholder="Digite o CEP">
                </div>

                <div class="form-group">
                  <label>Celular</label>
                  <input type="text" class="form-control" name="des_phone" placeholder="Digite o celular">
                </div>

                <div class="form-group">
                  <label>Telefone</label>
                  <input type="text" class="form-control" name="des_cel_phone" placeholder="Digite o telefone">
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="des_email" placeholder="Digite o email">
                </div>

                <div class="form-group">
                  <label>Site</label>
                  <input type="text" class="form-control" name="des_site" placeholder="Digite o site">
                </div>

                <div class="form-group">
                  <label>Observações</label>
                  <input type="text" class="form-control" name="des_obs" placeholder="Digite as observações que julgar necessárias">
                </div>

                <div class="form-group">
                  <label>Endereço de Cobrança</label>
                  <input type="text" class="form-control" name="des_address_charge" placeholder="Digite o endereço de cobrança">
                </div>

                <div class="form-group">
                  <label>Bairro de Cobrança</label>
                  <input type="text" class="form-control" name="des_neighborhood_charge" placeholder="Digite o bairro de cobrança">
                </div>

                <div class="form-group">
                  <label>Cidade/Estado de Cobrança</label>
                  <input type="text" class="form-control" name="des_city_state_charge" placeholder="Digite a cidade e o estado da cobrança">
                </div>

                <div class="form-group">
                  <label>CEP de Cobrança</label>
                  <input type="text" class="form-control" name="des_CEP_charge" placeholder="Digite o CEP da cobrança">
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