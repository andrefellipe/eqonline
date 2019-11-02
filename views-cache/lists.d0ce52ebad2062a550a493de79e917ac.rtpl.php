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

<div class="pagebreak"> </div>

<div class="container border-os header-os">
	<div class="row align-items-center justify-content-between">
		<div class="col-sm-auto">
			<img src="/resources/order/images/logo.png">
		</div>
		<div class="col-sm-auto">
			<h2>Departamento de Serviços Técnicos</h2>
			<h1>Lista de Material Completa</h1>
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
		<td><strong>COMPRA (R$)</strong></td>
		<td><strong>VENDA (R$)</strong></td>
		<td><strong>TOTAL (R$)</strong></td>
	</tr>


	<?php $counter1=-1;  if( isset($materialsM) && ( is_array($materialsM) || $materialsM instanceof Traversable ) && sizeof($materialsM) ) foreach( $materialsM as $key1 => $value1 ){ $counter1++; ?>
	<tr>
		<td><?php echo htmlspecialchars( $value1["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
		<td><?php echo htmlspecialchars( $value1["des_reduced_measure_unit"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td> 
		<td><?php echo formatPriceComma($value1["qtd_material"]); ?></td>
		<td><?php echo formatPriceComma($value1["vl_purchase_price"]); ?></td>
		<td><?php echo formatPriceComma($value1["vl_sell_price"]); ?></td>
		<td><?php echo formatPriceComma($value1["final_priceM"]); ?></td>
	</tr>
	<?php } ?>
</table>

<div class="container prices">
	<p>Material: <strong>R$ <?php echo formatPriceComma($proposal["vl_material"]); ?></strong></p>
	<p>Serviço: <strong>R$ <?php echo formatPriceComma($proposal["vl_service"]); ?></strong></p>
	<p>Material com Fator de Compra: <strong>R$ <?php echo formatPriceComma($proposal["vl_material_buy"]); ?></strong></p>
	<p>Serviço com Fator de Risco: <strong>R$ <?php echo formatPriceComma($proposal["vl_service_risk"]); ?></strong></p>
	<p>Preço de Horário Comercial: <strong>R$ <?php echo formatPriceComma($proposal["vl_price_commercial"]); ?></strong></p>
	<p>Preço de Horário Não-Comercial: <strong>R$ <?php echo formatPriceComma($proposal["vl_price_non_commercial"]); ?></strong></p>
</div>

<div class="pagebreak"> </div>

<div class="container border-os header-os">
	<div class="row align-items-center justify-content-between">
		<div class="col-sm-auto">
			<img src="/resources/order/images/logo.png">
		</div>
		<div class="col-sm-auto">
			<h2>Departamento de Serviços Técnicos</h2>
			<h1>Lista de Serviços</h1>
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
		<td><strong>PREÇO (R$)</strong></td>
		<td><strong>TOTAL (R$)</strong></td>
	</tr>


	<?php $counter1=-1;  if( isset($services) && ( is_array($services) || $services instanceof Traversable ) && sizeof($services) ) foreach( $services as $key1 => $value1 ){ $counter1++; ?>
	<tr>
		<td><?php echo htmlspecialchars( $value1["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
		<td><?php echo htmlspecialchars( $value1["des_unit"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td> 
		<td><?php echo formatPriceComma($value1["qtd_service"]); ?></td>
		<td><?php echo formatPriceComma($value1["vl_price"]); ?></td>
		<td><?php echo formatPriceComma($value1["final_priceS"]); ?></td>
	</tr>
	<?php } ?>
</table>

<div class="container prices">
	<p>Material: <strong>R$ <?php echo formatPriceComma($proposal["vl_material"]); ?></strong></p>
	<p>Serviço: <strong>R$ <?php echo formatPriceComma($proposal["vl_service"]); ?></strong></p>
	<p>Material com Fator de Compra: <strong>R$ <?php echo formatPriceComma($proposal["vl_material_buy"]); ?></strong></p>
	<p>Serviço com Fator de Risco: <strong>R$ <?php echo formatPriceComma($proposal["vl_service_risk"]); ?></strong></p>
	<p>Preço de Horário Comercial: <strong>R$ <?php echo formatPriceComma($proposal["vl_price_commercial"]); ?></strong></p>
	<p>Preço de Horário Não-Comercial: <strong>R$ <?php echo formatPriceComma($proposal["vl_price_non_commercial"]); ?></strong></p>
</div>
