<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">
          <h1>Cadastrar Usuário</h1>
        </div>

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/users">Usuários</a></li>
            <li class="breadcrumb-item active">Cadastrar Usuário</li>
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

            <form role="form" action="/admin/users/create" method="post">
              <div class="card-body">

                <div class="form-group">
                  <label>Nome</label>
                  <input type="text" class="form-control" id="des_name" name="des_name" required placeholder="Digite o nome">
                </div>

                <div class="form-group">
                  <label>Login</label>
                  <input type="text" class="form-control" id="des_login" name="des_login" required placeholder="Digite o login">
                </div>

                <div class="form-group">
                  <label>Senha</label>
                  <input type="password" class="form-control" id="des_password" name="des_password" required placeholder="Digite a senha">
                </div>

                <div class="form-group">
                  <label>CPF</label>
                  <input type="text" class="form-control" id="des_CPF" name="des_CPF" placeholder="Digite o CPF">
                </div>

                <div class="form-group">
                  <label>RG</label>
                  <input type="text" class="form-control" id="des_RG" name="des_RG" placeholder="Digite o RG">
                </div>

                <div class="form-group">
                  <label>Órgão Expedidor do RG</label>
                  <input type="text" class="form-control" id="des_RG_agency" name="des_RG_agency" placeholder="Digite o órgão expedidor">
                </div>

                <div class="form-group">
                  <label>UF</label>
                  <input type="text" class="form-control" id="des_UF" name="des_UF" placeholder="Digite a UF de expedição">
                </div>

                <div class="form-group">
                  <label>CNH</label>
                  <input type="text" class="form-control" id="des_CNH" name="des_CNH" placeholder="Digite o número da CNH">
                </div>

                <div class="form-group">
                  <label>Categoria da CNH</label>
                  <input type="text" class="form-control" id="des_CNH_category" name="des_CNH_category" placeholder="Digite a categoria da CNH">
                </div>

                <div class="form-group">
                  <label>Carteira de Trabalho</label>
                  <input type="text" class="form-control" id="des_workID" name="des_workID" placeholder="Digite o número da carteira">
                </div>

                <div class="form-group">
                  <label>Data de Admissão</label>
                  <input type="date" class="form-control" id="dt_admission" name="dt_admission" placeholder="Data de Admissão" />
                </div>

                <div class="form-group">
                  <label>Estado Civil</label>
                  <input type="text" class="form-control" id="des_civil_state" name="des_civil_state" placeholder="Digite o estado civil">
                </div>

                <div class="form-group">
                  <label>Banco</label>
                  <input type="text" class="form-control" id="des_bank" name="des_bank" placeholder="Digite o nome do banco">
                </div>

                <div class="form-group">
                  <label>Agência</label>
                  <input type="text" class="form-control" id="des_agency" name="des_agency" placeholder="Digite a agência">
                </div>

                <div class="form-group">
                  <label>Número da Conta</label>
                  <input type="text" class="form-control" id="des_account" name="des_account" placeholder="Digite o número da conta">
                </div>

                <div class="form-group">
                  <label>Tipo</label>
                  <input type="text" class="form-control" id="des_account_type" name="des_account_type" placeholder="Digite o tipo">
                </div>

                <div class="form-group">
                  <label>Endereço</label>
                  <input type="text" class="form-control" id="des_address" name="des_address" placeholder="Digite o endereço">
                </div>

                <div class="form-group">
                  <label>Bairro</label>
                  <input type="text" class="form-control" id="des_neighborhood" name="des_neighborhood" placeholder="Digite o bairro">
                </div>

                <div class="form-group">
                  <label>Cidade/Estado</label>
                  <input type="text" class="form-control" id="des_city_state" name="des_city_state" placeholder="Digite a cidade e o estado">
                </div>

                <div class="form-group">
                  <label>CEP</label>
                  <input type="text" class="form-control" id="des_CEP" name="des_CEP" placeholder="Digite o CEP">
                </div>

                <div class="form-group">
                  <label>Celular</label>
                  <input type="text" class="form-control" id="des_cel_phone" name="des_cel_phone" placeholder="Digite o celular">
                </div>

                <div class="form-group">
                  <label>Telefone</label>
                  <input type="text" class="form-control" id="des_phone" name="des_phone" placeholder="Digite o telefone">
                </div>

                <div class="form-group">
                  <label>Categoria</label>

                  <div class="radio">
                    <label><input type="radio" name="des_category" value=0 checked> Administrador</label>
                  </div>

                  <div class="radio">
                    <label><input type="radio" name="des_category" value=1> Estagiário</label>
                  </div>

                  <div class="radio">
                    <label><input type="radio" name="des_category" value=2> Técnico</label>
                  </div>
                </div>

                <div class="form-group">
                  <label>Vencimento de Documentos</label>
                  <div class="table-responsive">
                    <table class="table table-bordered" id="document_due_form">  
                      <tr>
                        <td><input type="text" name="des_doc_name[]" placeholder="Nome do Documento" class="form-control" /></td>
                        <td><input type="date" name="dt_due[]" placeholder="Data de Vencimento" class="form-control" /></td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Adicionar</button></td>
                      </tr>
                    </table>
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