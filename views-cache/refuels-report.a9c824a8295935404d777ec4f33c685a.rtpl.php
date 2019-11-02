<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container border-os header-os">
	<div class="row align-items-center justify-content-between">
		<div class="col-sm-auto">
			<img src="/resources/order/images/logo.png">
		</div>
		<div class="col">
			<h2>Abastecimentos</h2>
			<h1>Relatório de Consumo</h1>
		</div>
	</div>
</div>

<div class="container border-os infos-os">

	<div class="row">
		<div class="col">
			<p>Início: <strong><?php echo htmlspecialchars( $infos["dt_rstart"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
		</div>
		<div class="col">
			<p>Fim: <strong><?php echo htmlspecialchars( $infos["dt_rfinish"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
		</div>
		<div class="col">
			<p>Veículo: <strong><?php echo htmlspecialchars( $infos["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
		</div>
	</div>

</div>

<table style="width:100%" class="container">

	<tr>
		<td><strong>DATA</strong></td>
		<td><strong>FORNECEDOR</strong></td>
		<td><strong>LITROS</strong></td>
		<td><strong>PREÇO (R$)</strong></td>
		<td><strong>TOTAL (R$)</strong></td>
		<td><strong>KM ANTES</strong></td>
		<td><strong>KM ATUAL</strong></td>
		<td><strong>DIFERENÇA</strong></td>
		<td><strong>CUSTO/KM</strong></td>
	</tr>

	<?php $counter1=-1;  if( isset($data) && ( is_array($data) || $data instanceof Traversable ) && sizeof($data) ) foreach( $data as $key1 => $value1 ){ $counter1++; ?>
	<tr>
		<td><?php echo htmlspecialchars( $value1["dt_travel"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
		<td><?php echo htmlspecialchars( $value1["des_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td> 
		<td><?php echo formatPriceComma($value1["qtd_fuel"]); ?></td>
		<td><?php echo formatPriceComma($value1["vl_fuel"]); ?></td>
		<td><?php echo formatPriceComma($value1["vl_total"]); ?></td>
		<td><?php echo formatPriceComma($value1["des_km_out"]); ?></td>
		<td><?php echo formatPriceComma($value1["des_km_in"]); ?></td>
		<td><?php echo formatPriceComma($value1["diff"]); ?></td>
		<td><?php echo formatPriceComma($value1["cost"]); ?></td>
	</tr>
	<?php } ?>
</table>

<div class="container prices">
	<p>Total de Litros:: <strong>R$ <?php echo formatPriceComma($fuelTotal["fuel_total"]); ?></strong></p>
	<p>Gasto Total: <strong>R$ <?php echo formatPriceComma($priceTotal["price_total"]); ?></strong></p>
</div>