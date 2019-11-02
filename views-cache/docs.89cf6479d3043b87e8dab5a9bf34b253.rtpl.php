<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">

	<title>E&Q Online</title>

	<style>
		
		table, th, td {
			border: 1px solid black;
			text-align: center;
		}

	</style>
</head>
<body>

	<h3>Seguem abaixo os documentos dos funcionários da E&Q:</h3>

	<table>

		<thead>
			<tr>
				<th>Nome</th>
				<th>Documento</th>
				<th>Data de Vencimento</th>
				<th>Dias Restantes</th>
			</tr>
		</thead>

		<tbody>

			<?php $counter1=-1;  if( isset($docs) && ( is_array($docs) || $docs instanceof Traversable ) && sizeof($docs) ) foreach( $docs as $key1 => $value1 ){ $counter1++; ?>
			<tr>
				<td><?php echo htmlspecialchars( $value1["des_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
				<td><?php echo htmlspecialchars( $value1["des_doc_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
				<td><?php echo htmlspecialchars( $value1["dt_due"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
				<td><?php echo htmlspecialchars( $value1["dt_remaining"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
			</tr>
			<?php } ?>

		</tbody>

	</table>

</body>
</html>