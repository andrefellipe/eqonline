<?php if(!class_exists('Rain\Tpl')){exit;}?><p>-------------------- SPED: Copie os dados a partir da próxima linha ----------------</p>
|0000|011|0|<?php echo htmlspecialchars( $dates["dt_start"], ENT_COMPAT, 'UTF-8', FALSE ); ?>|<?php echo htmlspecialchars( $dates["dt_finish"], ENT_COMPAT, 'UTF-8', FALSE ); ?>|GOMES E VIEIRA LTDA EPP|70320304000111||RN|200853686|2408102|1253778||A|1|<br>
|0001|0|<br>
|0005|E E Q ENGENHARIA E QUALIDADE|59056440|RUA EDGAR BARBOSA|125||NOVA DESCOBERTA|8432117996||lauracontabil@yahoo.com.br|<br>
|0100|MARIA DE SOUZA CABRAL|42999430400|4240||59020260|RUA MEIRA E SA|166|SALA 03|BARRO VERMELHO|8432110356|8432110356|lauracontabil@yahoo.com.br|2408102|<br>
<?php $counter1=-1;  if( isset($units) && ( is_array($units) || $units instanceof Traversable ) && sizeof($units) ) foreach( $units as $key1 => $value1 ){ $counter1++; ?>
|0190|<?php echo htmlspecialchars( $value1["des_reduced_measure_unit"], ENT_COMPAT, 'UTF-8', FALSE ); ?>|<?php echo htmlspecialchars( $value1["des_measure_unit"], ENT_COMPAT, 'UTF-8', FALSE ); ?>|<br>
<?php } ?>
<?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
|0200|<?php echo htmlspecialchars( $value1["id_product"], ENT_COMPAT, 'UTF-8', FALSE ); ?>|<?php echo htmlspecialchars( $value1["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>|||<?php echo htmlspecialchars( $value1["des_reduced_measure_unit"], ENT_COMPAT, 'UTF-8', FALSE ); ?>|00|<?php echo htmlspecialchars( $value1["des_NCM"], ENT_COMPAT, 'UTF-8', FALSE ); ?>||96||||<br>
<?php } ?>
|0990|<?php echo htmlspecialchars( $qtd_block, ENT_COMPAT, 'UTF-8', FALSE ); ?>|<br>
|C001|1|<br>
|C990|2|<br>
|D001|1|<br>
|D990|2|<br>
|E001|0|<br>
|E100|<?php echo htmlspecialchars( $dates["dt_start"], ENT_COMPAT, 'UTF-8', FALSE ); ?>|<?php echo htmlspecialchars( $dates["dt_finish"], ENT_COMPAT, 'UTF-8', FALSE ); ?>|<br>
|E110|0|0|0|0|0|0|0|0|0|0|0|0|0|0|<br>
|E990|4|<br>
|G001|1|<br>
|G990|2|<br>
|H001|0|<br>
|H005|<?php echo htmlspecialchars( $dates["dt_finish"], ENT_COMPAT, 'UTF-8', FALSE ); ?>|<?php echo formatPriceComma($totalPrice); ?>|01|<br>
<?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
|H010|<?php echo htmlspecialchars( $value1["id_product"], ENT_COMPAT, 'UTF-8', FALSE ); ?>|<?php echo htmlspecialchars( $value1["des_reduced_measure_unit"], ENT_COMPAT, 'UTF-8', FALSE ); ?>|<?php echo formatPriceCommaDecimal($value1["qtd"]); ?>|<?php echo formatPriceCommaDecimal($value1["vl_sell_price"]); ?>|<?php echo formatPriceComma($value1["vl_price"]); ?>|0|||001|<?php echo formatPriceComma($value1["vl_price"]); ?>|<br>
<?php } ?>
|H990|<?php echo htmlspecialchars( $qtd_inventory, ENT_COMPAT, 'UTF-8', FALSE ); ?>|<br>
|K001|1|<br>
|K990|2|<br>
|1001|0|<br>
|1010|N|N|N|N|N|N|N|N|N|<br>
|1990|3|<br>
|9001|0|<br>
|9900|0000|1|<br>
|9900|0001|1|<br>
|9900|0005|1|<br>
|9900|0100|1|<br>
|9900|0190|<?php echo htmlspecialchars( $total_units, ENT_COMPAT, 'UTF-8', FALSE ); ?>|<br>
|9900|0200|<?php echo htmlspecialchars( $total_products, ENT_COMPAT, 'UTF-8', FALSE ); ?>|<br>
|9900|0990|1|<br>
|9900|C001|1|<br>
|9900|C990|1|<br>
|9900|D001|1|<br>
|9900|D990|1|<br>
|9900|E001|1|<br>
|9900|E100|1|<br>
|9900|E110|1|<br>
|9900|E990|1|<br>
|9900|G001|1|<br>
|9900|G990|1|<br>
|9900|H001|1|<br>
|9900|H005|1|<br>
|9900|H010|<?php echo htmlspecialchars( $total_products, ENT_COMPAT, 'UTF-8', FALSE ); ?>|<br>
|9900|H990|1|<br>
|9900|K001|1|<br>
|9900|K990|1|<br>
|9900|1001|1|<br>
|9900|1010|1|<br>
|9900|1990|1|<br>
|9900|9001|1|<br>
|9900|9990|1|<br>
|9900|9999|1|<br>
|9900|9900|30|<br>
|9990|33|<br>
|9999|<?php echo htmlspecialchars( $totalLines, ENT_COMPAT, 'UTF-8', FALSE ); ?>|
