<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Propostas</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<!--
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Data Tables</li>
					-->
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card">

				<div class="card-header">
					<a href="/admin/proposals/add" class="btn btn-success">Adicionar Proposta</a>
					<div class="card-tools">
						<!--
						<div class="input-group input-group-sm" style="width: 150px;">
							<input type="text" name="table_search" class="form-control float-right" placeholder="Pesquisar">
							<div class="input-group-append">
								<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
							</div>
						</div>
						-->
					</div>
				</div>

				<!-- /.card-header -->
				<div class="card-body table-responsive">
					<table id="all-proposals" class="table table-bordered table-striped">

						<thead>
							<tr>
								<th>Nº</th>
								<th>Título</th>
								<th>Cliente</th>
								<th>Modificação</th>
								<th>Opções</th>
							</tr>
						</thead>

						<tbody>
							
							<tr>
								<td>1</td>
								<td>Instalação de Caixas</td>
								<td>Nordestão - Loja 07</td>
								<td>19/02/2019 - André</td>
								<td>
									<a href="/admin/proposals/1" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
									<a href="/admin/proposals/1/generate" class="btn btn-default btn-sm"><i class="fa fa-file-upload"></i> Gerar Proposta</a>
									<a href="/admin/proposals/1/delete" onclick="return confirm('Deseja realmente excluir esta proposta?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Excluir</a>
								</td>
							</tr>

							<tr>
								<td>2</td>
								<td>Construção de Foguetes</td>
								<td>CLBI</td>
								<td>20/02/2019 - Fábio</td>
								<td>
									<a href="/admin/proposals/1" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
									<a href="/admin/proposals/1/generate" class="btn btn-default btn-sm"><i class="fa fa-file-upload"></i> Gerar Proposta</a>
									<a href="/admin/proposals/1/delete" onclick="return confirm('Deseja realmente excluir esta proposta?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Excluir</a>
								</td>
							</tr>

						</tbody>

					</table>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
	<div class="p-3">
      <!-- <h5>Title</h5>
      	<p>Sidebar content</p> -->
      </div>
  </aside>
  <!-- /.control-sidebar -->
