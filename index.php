<?php

//using auto loader to load all the classes from libs folder
include_once 'includes/autoLoader.inc.php';

require_once('config/paths.php');
require_once('config/database.php');

$app = new Bootstrap();

?>