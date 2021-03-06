<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container border-os header-os">
	<div class="row align-items-center justify-content-between">
		<div class="col-sm-auto">
			<img src="/resources/order/images/logo.png">
		</div>
		<div class="col">
			<h1>Relatório</h1>
			<h2>Contas a Receber</h2>
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
			<p>Cliente: <strong><?php echo htmlspecialchars( $infos["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
		</div>
	</div>

</div>

<table style="width:100%" class="container">

	<tr>
		<td><strong>CLIENTE</strong></td>
		<td><strong>VENCIMENTO</strong></td>
		<td><strong>VALOR (R$)</strong></td>
	</tr>


	<?php $counter1=-1;  if( isset($toReceive) && ( is_array($toReceive) || $toReceive instanceof Traversable ) && sizeof($toReceive) ) foreach( $toReceive as $key1 => $value1 ){ $counter1++; ?>
	<tr>
		<td><?php echo htmlspecialchars( $value1["des_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
		<td><?php echo htmlspecialchars( $value1["dt_due"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td> 
		<td><?php echo formatPriceComma($value1["vl_total"]); ?></td>
	</tr>
	<?php } ?>
</table>

<div class="container prices">
	<p>Total a Receber: <strong>R$ <?php echo formatPriceComma($totalReceive); ?></strong></p>
</div>

<div class="pagebreak"> </div>

<div class="container border-os header-os">
	<div class="row align-items-center justify-content-between">
		<div class="col-sm-auto">
			<img src="/resources/order/images/logo.png">
		</div>
		<div class="col">
			<h1>Relatório</h1>
			<h2>Contas Recebidas</h2>
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
			<p>Cliente: <strong><?php echo htmlspecialchars( $infos["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
		</div>
	</div>

</div>

<table style="width:100%" class="container">

	<tr>
		<td><strong>CLIENTE</strong></td>
		<td><strong>VENCIMENTO</strong></td>
		<td><strong>VALOR (R$)</strong></td>
	</tr>

	<?php $counter1=-1;  if( isset($received) && ( is_array($received) || $received instanceof Traversable ) && sizeof($received) ) foreach( $received as $key1 => $value1 ){ $counter1++; ?>
	<tr>
		<td><?php echo htmlspecialchars( $value1["des_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
		<td><?php echo htmlspecialchars( $value1["dt_due"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td> 
		<td><?php echo formatPriceComma($value1["vl_total"]); ?></td>
	</tr>
	<?php } ?>
</table>

<div class="container prices">
	<p>Total Recebido: <strong>R$ <?php echo formatPriceComma($totalReceived); ?></strong></p>
</div>