<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Contas</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="/admin">Início</a></li>
						<li class="breadcrumb-item active">Contas</li>
					</ol>
				</div>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">

					<div class="card-header">
						<a href="/admin/bills/create" class="btn btn-success">Cadastrar Conta</a>
					</div>

					<div class="card-body table-responsive">
						<table id="all-proposals" class="table table-bordered table-striped">

							<thead>
								<tr>
									<th>Nº</th>
									<th>Fornecedor/Cliente</th>
									<th>Vencimento</th>
									<th>Valor (R$)</th>
									<th>Status</th>
									<th>Opções</th>
								</tr>
							</thead>

							<tbody>
								
								<tr>
									<td>1</td>
									<td>Lojas Americanas</td>
									<td>2019-03-13</td>
									<td>100,00</td>
									<td>Paga</td>
									<td>
										<a href="/admin/bills/1" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
										<a href="/admin/bills/1/delete" onclick="return confirm('Deseja realmente excluir esta conta?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Excluir</a>
									</td>
								</tr>

							</tbody>

						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>