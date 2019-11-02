<?php 

/* Main .php file with the site's areas. */

session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;

$app = new Slim();

$app->config('debug', true);

require_once("admin.php");
require_once("log.php");
require_once("users.php");
require_once("suppliers.php");
require_once("clients.php");
require_once("proposals.php");
require_once("warehouse.php");
require_once("transport.php");
require_once("orders.php");
require_once("bills.php");
require_once("functions.php");

$app->run();

 ?>