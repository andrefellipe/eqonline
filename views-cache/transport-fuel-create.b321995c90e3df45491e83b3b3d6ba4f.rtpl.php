<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cadastrar Abastecimento</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Início</a></li>
            <li class="breadcrumb-item"><a href="/admin/transport/fuel">Abastecimentos</a></li>
            <li class="breadcrumb-item active">Cadastrar Abastecimento</li>
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
                  <label>Motorista</label>
                  <select class="form-control select2">
                    <option>Gustavo Revoredo</option>
                    <option>José Ivanildo</option>
                    <option>Ana Karolina</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Data do Abastecimento</label>
                  <input type="date" class="form-control" />
                </div>

                <div class="form-group">
                  <label>Descrição do Veículo</label>
                  <select class="form-control select2">
                    <option>Carro 1</option>
                    <option>Carro 2</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <label>Hora de Saída</label>
                  <input type="time" class="form-control" />
                </div>

                <div class="form-group">
                  <label>Hora de Chegada</label>
                  <input type="time" class="form-control" />
                </div>

                <div class="form-group">
                  <label>Quilometragem de Saída</label>
                  <input type="text" class="form-control" placeholder="Digite a quilometragem do veículo no instante de saída">
                </div>

                <div class="form-group">
                  <label>Quilometragem de Chegada</label>
                  <input type="text" class="form-control" placeholder="Digite a quilometragem do veículo no instante de chegada">
                </div>

                <div class="form-group">
                  <label>Fornecedor</label>
                  <select class="form-control select2">
                    <option>Miranda Computação</option>
                    <option>Oficina do Bona</option>
                    <option>Lampadinha</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Quantidade de Combustível (litros)</label>
                  <input type="text" class="form-control" placeholder="Digite quantos litros de combustível foram abastecidos">
                </div>

                <div class="form-group">
                  <label>Preço do Litro de Combustível (R$)</label>
                  <input type="text" class="form-control" placeholder="Digite o preço do litro de combustível">
                </div>

                <div class="form-group">
                  <label>Valor Total (R$)</label>
                  <input type="text" class="form-control" placeholder="Digite o valor total do abastecimento">
                </div>

                <div class="form-group">
                  <label>Número da Nota Fiscal</label>
                  <input type="text" class="form-control" placeholder="Digite o número da nota fiscal">
                </div>

                <div class="form-group">
                  <label>Observações</label>
                  <input type="text" class="form-control" placeholder="Descreva outros detalhes que achar conveniente (multa, problemas no veículo, etc)">
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