<?php
require_once 'vendor/autoload.php';

use \App\Config\Config;
use \App\Config\Parser\ArrayParser;
use \App\Config\Parser\JsonParser;

$config = new Config(new JsonParser);
$config->load('config/database.json');

echo $config->get('ава', '232');