<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container border-os header-os">
	<div class="row align-items-center justify-content-between">
		<div class="col-sm-auto">
			<img src="/resources/order/images/logo.png">
		</div>
		<div class="col-sm-auto">
			<h2>Departamento de Serviços Técnicos</h2>
			<h1>Lista de Material</h1>
		</div>
		<div class="col-sm-auto">
			<h3>Nº</h3>
			<hr>
			<h3><?php echo htmlspecialchars( $info["id_proposal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
		</div>
	</div>
</div>

<div class="container border-os infos-os">

	<div class="row">
		<div class="col">
			<p>Número da Proposta: <strong><?php echo htmlspecialchars( $info["id_proposal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
		</div>
		<div class="col">
			<p>Cliente: <strong><?php echo htmlspecialchars( $info["des_client_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<p>Serviço: <strong><?php echo htmlspecialchars( $info["des_service"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
		</div>
		<div class="col">
			<p>Data de Emissão: <strong><?php echo htmlspecialchars( $info["dt_emission"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
		</div>
	</div>

</div>

<table style="width:100%" class="container">

	<tr>
		<td><strong>NOME</strong></td>
		<td><strong>UNIDADE</strong></td>
		<td><strong>QUANTIDADE</strong></td>
	</tr>


	<?php $counter1=-1;  if( isset($materials) && ( is_array($materials) || $materials instanceof Traversable ) && sizeof($materials) ) foreach( $materials as $key1 => $value1 ){ $counter1++; ?>
		<tr>
			<td><?php echo htmlspecialchars( $value1["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
			<td><?php echo htmlspecialchars( $value1["des_reduced_measure_unit"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td> 
			<td><?php echo formatPriceComma($value1["qtd_material"]); ?></td>
		</tr>
	<?php } ?>
</table>