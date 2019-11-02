<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Editar Registro</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="/admin">Início</a></li>
						<li class="breadcrumb-item"><a href="/admin/log/register">Ponto</a></li>
						<li class="breadcrumb-item"><a href="/admin/log/records">Registros</a></li>
						<li class="breadcrumb-item"><a href="/admin/log/records/users">Todos os Registros</a></li>
						<li class="breadcrumb-item active">Editar Registro</li>
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
							<h3 class="card-title">Insira a data e os horários de trabalho ou de intervalo</h3>
						</div>

						<form role="form" action="/admin/users/<?php echo htmlspecialchars( $record["id_user"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/log/<?php echo htmlspecialchars( $record["id_record"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
							<div class="card-body">

								<div class="form-group">
									<label>Início</label>
									<input type="datetime-local" class="form-control" id="dt_start" name="dt_start" value="<?php echo htmlspecialchars( $record["dt_start"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"/>
								</div>

								<div class="form-group">
									<label>Fim</label>
									<input type="datetime-local" class="form-control" id="dt_finish" name="dt_finish" value="<?php echo htmlspecialchars( $record["dt_finish"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"/>
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