<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Adicionar Proposta</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
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
              <h3 class="card-title">Informações do Cliente</h3>
            </div>

            <form role="form">
              <div class="card-body">

                <div class="form-group">
                  <label>Cliente</label>
                  <select class="form-control select2">
                    <option>Nordestão</option>
                    <option>Dona Regina</option>
                    <option>SESC</option>
                    <option>Evolux</option>
                  </select>
                </div>

              </div>

            </form>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Informações da Proposta</h3>
            </div>

            <form role="form">
              <div class="card-body">

                <div class="form-group">
                  <label>Serviço</label>
                  <input type="text" class="form-control" placeholder="Descreva o serviço correspondente a essa proposta">
                </div>

                <div class="form-group">
                  <label>Data da Visita</label>
                  <input type="date" class="form-control" />
                </div>

                <div class="form-group">
                  <label>Data de Emissão</label>
                  <input type="date" class="form-control" />
                </div>

              </div>

            </form>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Descrição dos Materiais</h3>
            </div>

            <form role="form">
              <div class="card-body">

                <div class="form-group">
                  <form name="add_name" id="add_name">  
                    <div class="table-responsive">  
                     <table class="table table-bordered" id="dynamic_field">
                      <tr>

                        <td>
                          <select class="form-control select2">
                            <option>Abraçadeira</option>
                            <option>Parafuso</option>
                            <option>Tinta</option>
                          </select>
                        </td>

                        <td><input type="text" name="quantity[]" placeholder="Quantidade" class="form-control quantity"/></td>

                        <td><button type="button" name="add" id="add" class="btn btn-success">Adicionar</button></td>

                      </tr>
                    </table>  
                  </div>
                </form>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Descrição dos Serviços</h3>
            </div>

            <form role="form">
              <div class="card-body">

                <div class="form-group">
                  <form name="add_name" id="add_name">  
                    <div class="table-responsive">  
                     <table class="table table-bordered" id="dynamic_field2">  
                      <tr>

                        <td>
                          <select class="form-control select2">
                            <option>Abraçadeira</option>
                            <option>Parafuso</option>
                            <option>Tinta</option>
                          </select>
                        </td>

                        <td><input type="text" name="quantity[]" placeholder="Quantidade" class="form-control quantity-services"/></td>

                        <td><button type="button" name="add2" id="add2" class="btn btn-success">Adicionar</button></td>

                      </tr>
                    </table>  
                  </div>
                </form>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Totais</h3>
          </div>

          <form role="form">
            <div class="card-body">

              <div class="form-group">
                <label>Total de Material (R$)</label>
                <input type="text" class="form-control" disabled>
              </div>

              <div class="form-group">
                <label>Total de Serviço (R$)</label>
                <input type="text" class="form-control" disabled>
              </div>

              <div class="form-group">
                <label>Fator de Compra (%)</label>
                <input type="text" class="form-control" placeholder="Defina o fator de compra">
              </div>

              <div class="form-group">
                <label>Fator de Risco (%)</label>
                <input type="text" class="form-control" placeholder="Defina o fator de risco">
              </div>

              <div class="form-group">
                <label>Total de Material com Fator de Compra (R$)</label>
                <input type="text" class="form-control" disabled>
              </div>

              <div class="form-group">
                <label>Total de Serviço com Fator de Risco (R$)</label>
                <input type="text" class="form-control" disabled>
              </div>

              <div class="form-group">
                <label>Total no Horário Comercial (R$)</label>
                <input type="text" class="form-control" disabled>
              </div>

              <div class="form-group">
                <label>Total no Horário Não-Comercial (R$)</label>
                <input type="text" class="form-control" disabled>
              </div>

            </div>

          </form>
        </div>
      </div>
    </div>

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Adicionar Proposta</button>
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
