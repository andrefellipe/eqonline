<?php 

function formatPriceComma($vlprice)
{

	if (!$vlprice > 0) $vlprice = 0;

	return number_format($vlprice, 2, ",", ".");

}

function formatPriceCommaDecimal($vlprice)
{

	if (!$vlprice > 0) $vlprice = 0;

	return number_format($vlprice, 3, ",", ".");

}

 ?>