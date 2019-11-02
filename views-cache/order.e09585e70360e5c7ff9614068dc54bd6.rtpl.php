<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container border-os header-os">
	<div class="row align-items-center justify-content-between">
		<div class="col-sm-auto">
			<img src="/resources/order/images/logo.png">
		</div>
		<div class="col-sm-auto">
			<h2>Departamento de Serviços Técnicos</h2>
			<h1>Relatório de Atendimento Técnico</h1>
		</div>
		<div class="col-sm-auto">
			<h3>O.S.</h3>
			<hr>
			<h3><?php echo htmlspecialchars( $order["id_order"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
		</div>
	</div>
</div>

<div class="container border-os infos-os">

	<div class="row">
		<div class="col">
			<p>Nome/Razão Social: <strong><?php echo htmlspecialchars( $order["des_client_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
		</div>
		<div class="col">
			<p>CPF/CNPJ: <strong><?php echo htmlspecialchars( $order["des_CPF"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<p>Endereço: <strong><?php echo htmlspecialchars( $order["des_address"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
		</div>
		<div class="col">
			<p>Bairro: <strong><?php echo htmlspecialchars( $order["des_neighborhood"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<p>Cidade/Estado: <strong><?php echo htmlspecialchars( $order["des_city_state"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
		</div>
		<div class="col">
			<p>CEP: <strong><?php echo htmlspecialchars( $order["des_CEP"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<p>Celular: <strong><?php echo htmlspecialchars( $order["des_cel_phone"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
		</div>
		<div class="col">
			<p>Telefone: <strong><?php echo htmlspecialchars( $order["des_phone"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
		</div>
	</div>

	<hr>

	<div class="row">
		<div class="col">
			<p>Descrição: <strong><?php echo htmlspecialchars( $order["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
		</div>
	</div>

	<hr>

	<div class="row">
		<div class="col">
			<p>Equipamento: <strong><?php echo htmlspecialchars( $order["des_equipament"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
		</div>
		<div class="col">
			<p>Modelo: <strong><?php echo htmlspecialchars( $order["des_model"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<p>Número de Série: <strong><?php echo htmlspecialchars( $order["des_number"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
		</div>
		<div class="col">
			<p>Solicitante: <strong><?php echo htmlspecialchars( $order["des_solicitor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
		</div>
	</div>

	<hr>

	<div class="row">
		<div class="col">
			<p><strong>GARANTIA (  )</strong></p>
		</div>
		<div class="col">
			<p><strong>PROPOSTA (  )</strong></p>
		</div>
		<div class="col">
			<p><strong>CONTRATO (  )</strong></p>
		</div>
		<div class="col">
			<p><strong>AVULSO (  )</strong></p>
		</div>
		<div class="col">
			<p><strong>ORÇAMENTO (  )</strong></p>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<p>SOLICITADO: <strong><?php echo htmlspecialchars( $order["dt_start"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
		</div>
		<div class="col">
			<p>ATENDIDO: <strong><?php echo htmlspecialchars( $order["dt_finish"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
		</div>
	</div>

</div>

<div class="container infos-os">
	
	<div class="row">
		<div class="col-2 cell">
			<p><strong>Hr. Chegada</strong></p>
		</div>
		<div class="col-3 cell">
			<h5></h5>
		</div>
		<div class="col-7 cell">
			<h5></h5>
		</div>
	</div>

	<div class="row">
		<div class="col-2 cell">
			<p><strong>Hr. Início</strong></p>
		</div>
		<div class="col-3 cell">
			<h5></h5>
		</div>
		<div class="col-7 cell">
			<h5></h5>
		</div>
	</div>

	<div class="row">
		<div class="col-2 cell">
			<p><strong>Hr. Término</strong></p>
		</div>
		<div class="col-3 cell">
			<h5></h5>
		</div>
		<div class="col-7 cell">
			<h5></h5>
		</div>
	</div>

	<div class="row">
		<div class="col-2 cell">
			<p><strong>Hr. Saída</strong></p>
		</div>
		<div class="col-3 cell">
			<h5></h5>
		</div>
		<div class="col-7 cell">
			<h5></h5>
		</div>
	</div>

	<div class="row">
		<div class="col-2 cell">
			<p><strong>Tot. Desloc</strong></p>
		</div>
		<div class="col-3 cell">
			<h5></h5>
		</div>
		<div class="col-7 cell">
			<h5></h5>
		</div>
	</div>

	<div class="row">
		<div class="col-2 cell">
			<p><strong>Tot. Reparo</strong></p>
		</div>
		<div class="col-3 cell">
			<h5></h5>
		</div>
		<div class="col-7 cell">
			<h5></h5>
		</div>
	</div>

	<div class="row">
		<div class="col-2 cell">
			<p><strong>Tot. Geral</strong></p>
		</div>
		<div class="col-3 cell">
			<h5></h5>
		</div>
		<div class="col-7 cell">
			<h5></h5>
		</div>
	</div>

</div>


<div class="container infos-os">
	
	<div class="row">
		<div class="col-7 cell">
			<p><strong>Peças Utilizadas</strong></p>
		</div>
		<div class="col-1 cell">
			<p><strong>Qtd.</strong></p>
		</div>
		<div class="col-2 cell">
			<p><strong>Valor</strong></p>
		</div>
		<div class="col-2 cell">
			<p><strong>Total</strong></p>
		</div>
	</div>

	<div class="row">
		<div class="col-7 cell">
			<h5></h5>
		</div>
		<div class="col-1 cell">
			<h5></h5>
		</div>
		<div class="col-2 cell">
			<h5></h5>
		</div>
		<div class="col-2 cell">
			<h5></h5>
		</div>
	</div>

	<div class="row">
		<div class="col-7 cell">
			<h5></h5>
		</div>
		<div class="col-1 cell">
			<h5></h5>
		</div>
		<div class="col-2 cell">
			<h5></h5>
		</div>
		<div class="col-2 cell">
			<h5></h5>
		</div>
	</div>

	<div class="row">
		<div class="col-7 cell">
			<h5></h5>
		</div>
		<div class="col-1 cell">
			<h5></h5>
		</div>
		<div class="col-2 cell">
			<h5></h5>
		</div>
		<div class="col-2 cell">
			<h5></h5>
		</div>
	</div>

	<div class="row">
		<div class="col-7 cell">
			<h5></h5>
		</div>
		<div class="col-1 cell">
			<h5></h5>
		</div>
		<div class="col-2 cell">
			<h5></h5>
		</div>
		<div class="col-2 cell">
			<h5></h5>
		</div>
	</div>

	<div class="row">
		<div class="col-7 cell">
			<h5></h5>
		</div>
		<div class="col-1 cell">
			<h5></h5>
		</div>
		<div class="col-2 cell">
			<h5></h5>
		</div>
		<div class="col-2 cell">
			<h5></h5>
		</div>
	</div>

	<div class="row">
		<div class="col-7 cell">
			<h5></h5>
		</div>
		<div class="col-1 cell">
			<h5></h5>
		</div>
		<div class="col-2 cell">
			<h5></h5>
		</div>
		<div class="col-2 cell">
			<h5></h5>
		</div>
	</div>

	<div class="row">
		<div class="col-7 cell">
			<h5></h5>
		</div>
		<div class="col-1 cell">
			<h5></h5>
		</div>
		<div class="col-2 cell">
			<h5></h5>
		</div>
		<div class="col-2 cell">
			<h5></h5>
		</div>
	</div>

	<div class="row">
		<div class="col-7 cell">
			<h5></h5>
		</div>
		<div class="col-1 cell">
			<h5></h5>
		</div>
		<div class="col-2 cell">
			<h5></h5>
		</div>
		<div class="col-2 cell">
			<h5></h5>
		</div>
	</div>

	<div class="row">
		<div class="col-7 cell">
			<h5></h5>
		</div>
		<div class="col-1 cell">
			<h5></h5>
		</div>
		<div class="col-2 cell">
			<h5></h5>
		</div>
		<div class="col-2 cell">
			<h5></h5>
		</div>
	</div>

	<div class="row">
		<div class="col-7 cell">
			<h5></h5>
		</div>
		<div class="col-1 cell">
			<h5></h5>
		</div>
		<div class="col-2 cell">
			<h5></h5>
		</div>
		<div class="col-2 cell">
			<h5></h5>
		</div>
	</div>

	<div class="row">
		<div class="col-7 cell">
			<h5></h5>
		</div>
		<div class="col-1 cell">
			<h5></h5>
		</div>
		<div class="col-2 cell">
			<h5></h5>
		</div>
		<div class="col-2 cell">
			<h5></h5>
		</div>
	</div>

</div>

<div class="container infos-os">
	
	<div class="row">
		<div class="col-3 cell">
			<p><strong>NOME DO TÉCNICO</strong></p>
		</div>
		<div class="col-4 cell">
			<h5></h5>
		</div>
		<div class="col-3 cell">
			<p><strong>TOTAL PEÇAS (R$)</strong></p>
		</div>
		<div class="col-2 cell">
			<h5></h5>
		</div>
	</div>

	<div class="row">
		<div class="col-3 cell">
			<p><strong>ASSINATURA DO TÉCNICO</strong></p>
		</div>
		<div class="col-4 cell">
			<h5></h5>
		</div>
		<div class="col-3 cell">
			<p><strong>TOTAL DE HORAS (R$)</strong></p>
		</div>
		<div class="col-2 cell">
			<h5></h5>
		</div>
	</div>

	<div class="row">
		<div class="col-3 cell">
			<p><strong>ASSINATURA DO CLIENTE</strong></p>
		</div>
		<div class="col-4 cell">
			<h5></h5>
		</div>
		<div class="col-3 cell">
			<p><strong>TOTAL GERAL (R$)</strong></p>
		</div>
		<div class="col-2 cell">
			<h5></h5>
		</div>
	</div>

</div>