<?php
require 'vendor/autoload.php';

use peest\Peest;

$Peest = new Peest($argv[1]);
$Peest->run();
exit;