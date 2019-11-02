<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Gerar Proposta</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/proposals">Propostas</a></li>
            <li class="breadcrumb-item active">Gerar Proposta</li>
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

            <form role="form" action="/admin/proposals/<?php echo htmlspecialchars( $proposal["id_proposal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/generate" method="post">
              <div class="card-body">

                <div class="form-group">
                  <label>Código da Proposta</label>
                  <input type="text" class="form-control" name="id_proposal" value="<?php echo htmlspecialchars( $proposal["id_proposal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Data de Emissão</label>
                  <input type="date" class="form-control" name="dt_emission" value="<?php echo htmlspecialchars( $proposal["dt_emission"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly />
                </div>

                <div class="form-group">
                  <label>Destinatário</label>
                  <input type="text" class="form-control" name="des_destination" required placeholder="Exemplo: Ao Nordestão - Loja 98">
                </div>

                <div class="form-group">
                  <label>Contato</label>
                  <input type="text" class="form-control" name="des_contact" required placeholder="Exemplo: Déborah/Marcela">
                </div>

                <div class="form-group">
                  <label>Saudação</label>
                  <input type="text" class="form-control" name="des_salutation" required placeholder="Exemplo: Prezadas Senhoritas,">
                </div>

                <div class="form-group">
                  <label>Introdução</label>
                  <input type="text" class="form-control" name="des_introduction" required placeholder="Exemplo: Em resposta a sua consulta, segue a nossa proposta de preços para o serviço de instalação de conjunto de tomadas estabilizadas, conjunto de tomadas comuns e pontos lógicos, na sala de suporte da Loja 98.">
                </div>

                <div class="form-group">
                  <label>Preços</label>
                  <div class="table-responsive">
                    <table class="table table-bordered" id="item_form">  
                      <tr>
                        <td style="width: 10%"><input type="text" name="item[]" placeholder="Item" class="form-control" required /></td>
                        <td style="width: 36%"><input type="text" name="des_description[]" placeholder="Descrição" class="form-control" required /></td>
                        <td style="width: 11%"><input type="text" name="qtd[]" placeholder="Qtd." class="form-control" required /></td>
                        <td style="width: 11%"><input type="text" name="unit[]" placeholder="Unid." class="form-control" required /></td>
                        <td style="width: 16%"><input type="text" name="price[]" placeholder="P. Unit." class="form-control" required /></td>
                        <td style="width: 16%"><input type="text" name="total_price[]" placeholder="Total" class="form-control" required /></td>
                        <td><button type="button" name="addItem" id="addItem" class="btn btn-success">Adicionar</button></td>
                      </tr>
                    </table>
                  </div>
                </div>

                <div class="form-group">
                  <label>Total da Cotação</label>
                  <input type="text" class="form-control" name="vl_price" require placeholder="Exemplo: R$ 1.167,93">
                </div>

                <div class="form-group">
                  <label>Horário</label>
                  <input type="text" class="form-control" name="des_schedule" required placeholder="Exemplo: Preço cotado após o horário comercial.">
                </div>

                <div class="form-group">
                  <label>Valor da Proposta</label>
                  <input type="text" class="form-control" name="des_price" required placeholder="Exemplo: Um mil, cento e sessenta e sete reais e noventa e três centavos">
                </div>

                <div class="form-group">
                  <label>Condição de Pagamento</label>
                  <input type="text" class="form-control" name="des_payment_condition" required placeholder="Exemplo: Na conclusão do serviço.">
                </div>

                <div class="form-group">
                  <label>Prazo</label>
                  <input type="text" class="form-control" name="des_service_deadline" required placeholder="Exemplo: Execução do serviço em 3 (três) horas após o horário comercial ou Entrega do material até dia 31/12/2019.">
                </div>

                <div class="form-group">
                  <label>Validade da Proposta</label>
                  <input type="text" class="form-control" name="des_proposal_validity" required placeholder="Exemplo: 20 (vinte) dias.">
                </div>

                <div class="form-group">
                  <label>Garantia</label>
                  <input type="text" class="form-control" name="des_warranty" required placeholder="Exemplo: 3 (três) meses para serviços prestados pela E&Q.">
                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Gerar Proposta</button>
              </div>

            </form>

          </div>
        </div>
      </div>

    </div>

  </section>

</div>