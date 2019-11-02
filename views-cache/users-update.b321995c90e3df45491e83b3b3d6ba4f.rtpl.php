<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">
          <h1>Editar Usuário</h1>
        </div>

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/users">Usuários</a></li>
            <li class="breadcrumb-item active">Editar Usuário</li>
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

            <form role="form" action="/admin/users/<?php echo htmlspecialchars( $user["id_user"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
              <div class="card-body">

                <div class="form-group">
                  <label>Nome</label>
                  <input type="text" class="form-control" id="des_name" name="des_name" required placeholder="Digite o nome" value="<?php echo htmlspecialchars( $user["des_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Login</label>
                  <input type="text" class="form-control" id="des_login" name="des_login" required placeholder="Digite o login" value="<?php echo htmlspecialchars( $user["des_login"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>CPF</label>
                  <input type="text" class="form-control" id="des_CPF" name="des_CPF" placeholder="Digite o CPF" value="<?php echo htmlspecialchars( $user["des_CPF"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>RG</label>
                  <input type="text" class="form-control" id="des_RG" name="des_RG" placeholder="Digite o RG" value="<?php echo htmlspecialchars( $user["des_RG"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Órgão Expedidor do RG</label>
                  <input type="text" class="form-control" id="des_RG_agency" name="des_RG_agency" placeholder="Digite o órgão expedidor" value="<?php echo htmlspecialchars( $user["des_RG_agency"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>UF</label>
                  <input type="text" class="form-control" id="des_UF" name="des_UF" placeholder="Digite a UF de expedição" value="<?php echo htmlspecialchars( $user["des_UF"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>CNH</label>
                  <input type="text" class="form-control" id="des_CNH" name="des_CNH" placeholder="Digite o número da CNH" value="<?php echo htmlspecialchars( $user["des_CNH"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Categoria da CNH</label>
                  <input type="text" class="form-control" id="des_CNH_category" name="des_CNH_category" placeholder="Digite a categoria da CNH" value="<?php echo htmlspecialchars( $user["des_CNH_category"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Carteira de Trabalho</label>
                  <input type="text" class="form-control" id="des_workID" name="des_workID" placeholder="Digite o número da carteira" value="<?php echo htmlspecialchars( $user["des_workID"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Data de Admissão</label>
                  <input type="date" class="form-control" id="dt_admission" name="dt_admission" placeholder="Data de Admissão" value="<?php echo htmlspecialchars( $user["dt_admission"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"/>
                </div>

                <div class="form-group">
                  <label>Estado Civil</label>
                  <input type="text" class="form-control" id="des_civil_state" name="des_civil_state" placeholder="Digite o estado civil" value="<?php echo htmlspecialchars( $user["des_civil_state"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Banco</label>
                  <input type="text" class="form-control" id="des_bank" name="des_bank" placeholder="Digite o nome do banco" value="<?php echo htmlspecialchars( $user["des_bank"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Agência</label>
                  <input type="text" class="form-control" id="des_agency" name="des_agency" placeholder="Digite a agência" value="<?php echo htmlspecialchars( $user["des_agency"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Número da Conta</label>
                  <input type="text" class="form-control" id="des_account" name="des_account" placeholder="Digite o número da conta" value="<?php echo htmlspecialchars( $user["des_account"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Tipo</label>
                  <input type="text" class="form-control" id="des_account_type" name="des_account_type" placeholder="Digite o tipo" value="<?php echo htmlspecialchars( $user["des_account_type"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Endereço</label>
                  <input type="text" class="form-control" id="des_address" name="des_address" placeholder="Digite o endereço" value="<?php echo htmlspecialchars( $user["des_address"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Bairro</label>
                  <input type="text" class="form-control" id="des_neighborhood" name="des_neighborhood" placeholder="Digite o bairro" value="<?php echo htmlspecialchars( $user["des_neighborhood"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Cidade/Estado</label>
                  <input type="text" class="form-control" id="des_city_state" name="des_city_state" placeholder="Digite a cidade e o estado" value="<?php echo htmlspecialchars( $user["des_city_state"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>CEP</label>
                  <input type="text" class="form-control" id="des_CEP" name="des_CEP" placeholder="Digite o CEP" value="<?php echo htmlspecialchars( $user["des_CEP"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Celular</label>
                  <input type="text" class="form-control" id="des_cel_phone" name="des_cel_phone" placeholder="Digite o celular" value="<?php echo htmlspecialchars( $user["des_cel_phone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Telefone</label>
                  <input type="text" class="form-control" id="des_phone" name="des_phone" placeholder="Digite o telefone" value="<?php echo htmlspecialchars( $user["des_phone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>

                <div class="form-group">
                  <label>Categoria</label>

                  <div class="radio">
                    <label>
                      <input type="radio" name="des_category" <?php if( $user["des_category"] == 0 ){ ?>checked<?php } ?> value=0> Administrador
                    </label>
                  </div>

                  <div class="radio">
                    <label>
                      <input type="radio" name="des_category" <?php if( $user["des_category"] == 1 ){ ?>checked<?php } ?> value=1> Estagiário
                    </label>
                  </div>

                  <div class="radio">
                    <label>
                      <input type="radio" name="des_category" <?php if( $user["des_category"] == 2 ){ ?>checked<?php } ?> value=2> Técnico
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <label>Vencimento de Documentos</label>
                  <div class="table-responsive">
                    <table class="table table-bordered" id="document_due_form">
                      <?php if( $docEmpty == 1 ){ ?>
                      <tr>
                        <td><input type="text" name="des_doc_name[]" placeholder="Nome do Documento" class="form-control" /></td>
                        <td><input type="date" name="dt_due[]" placeholder="Data de Vencimento" class="form-control" /></td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Adicionar</button></td>
                      </tr>
                      <?php } ?>

                      <?php $counter1=-1;  if( isset($docData) && ( is_array($docData) || $docData instanceof Traversable ) && sizeof($docData) ) foreach( $docData as $key1 => $value1 ){ $counter1++; ?>
                      <?php if( $counter1 == 0 ){ ?>
                      <tr>
                        <td><input type="text" name="des_doc_name[]" placeholder="Nome do Documento" value="<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control" /></td>
                        <td><input type="date" name="dt_due[]" placeholder="Data de Vencimento" value="<?php echo htmlspecialchars( $value1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control" /></td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Adicionar</button></td>
                      </tr>
                      <?php }else{ ?>
                      <tr>
                        <td><input type="text" name="des_doc_name[]" placeholder="Nome do Documento" value="<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control" /></td>
                        <td><input type="date" name="dt_due[]" placeholder="Data de Vencimento" value="<?php echo htmlspecialchars( $value1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control" /></td>
                        <td><button type="button" name="remove" id="<?php echo htmlspecialchars( $counter1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-danger btn_remove" onclick="return alert('Para excluir o documento, apague o nome do mesmo e clique em Alterar Dados')">X</button></td>
                      </tr>
                      <?php } ?>
                      <?php } ?>
                    </table>
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
  </section>
</div>