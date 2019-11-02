<?php if(!class_exists('Rain\Tpl')){exit;}?><img src="/resources/proposal/images/logo.png">

<p>Proposta nº <?php echo htmlspecialchars( $proposal["id_proposal"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
<p>Natal/RN, <?php echo htmlspecialchars( $proposal["dt_emission"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>

<hr>
<p><strong><?php echo htmlspecialchars( $proposal["des_destination"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
<p>Att. <strong><?php echo htmlspecialchars( $proposal["des_contact"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
<p><?php echo htmlspecialchars( $proposal["des_salutation"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
<p><?php echo htmlspecialchars( $proposal["des_introduction"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
<hr>
<p class="comercial-border"><strong>PROPOSTA COMERCIAL</strong></p>
<p><strong>1. Preços</strong></p>

<table style="width:100%">

	<tr>
		<td><strong>ITEM</strong></td>
		<td><strong>DESCRIÇÃO</strong></td>
		<td><strong>QTD</strong></td>
		<td><strong>UNID.</strong></td>
		<td><strong>PREÇO UNIT.</strong></td>
		<td><strong>TOTAL</strong></td>
	</tr>


	<?php $counter1=-1;  if( isset($items) && ( is_array($items) || $items instanceof Traversable ) && sizeof($items) ) foreach( $items as $key1 => $value1 ){ $counter1++; ?>
		<tr>
			<td><strong><?php echo htmlspecialchars( $value1["item"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></td>
			<td><?php echo htmlspecialchars( $value1["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td> 
			<td><?php echo htmlspecialchars( $value1["qtd"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
			<td><?php echo htmlspecialchars( $value1["unit"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
			<td><?php echo htmlspecialchars( $value1["price"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
			<td><?php echo htmlspecialchars( $value1["total_price"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
		</tr>
	<?php } ?>
</table>

<p><strong>Total da Cotação: <?php echo htmlspecialchars( $proposal["vl_price"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></p>
<p><?php echo htmlspecialchars( $proposal["des_schedule"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
<p>Valor da Proposta: <em><?php echo htmlspecialchars( $proposal["des_price"], ENT_COMPAT, 'UTF-8', FALSE ); ?></em></p>

<p><strong>2. Demais Condições</strong></p>

<table>
	<tr>
		<td style="white-space: nowrap"><strong>Condição de Pagamento</strong></td>
		<td style="width: 100%"><?php echo htmlspecialchars( $proposal["des_payment_condition"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td> 
	</tr>
	<tr>
		<td style="white-space: nowrap"><strong>Prazo</strong></td>
		<td style="width: 100%"><?php echo htmlspecialchars( $proposal["des_service_deadline"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td> 
	</tr>
	<tr>
		<td style="white-space: nowrap"><strong>Validade da Proposta</strong></td>
		<td style="width: 100%"><?php echo htmlspecialchars( $proposal["des_proposal_validity"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td> 
	</tr>
	<tr>
		<td style="white-space: nowrap"><strong>Garantia</strong></td>
		<td style="width: 100%"><?php echo htmlspecialchars( $proposal["des_warranty"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td> 
	</tr>
</table>

<div class="pagebreak"> </div>

<img src="/resources/proposal/images/logo.png">

<img src="/resources/proposal/images/assinatura.png">