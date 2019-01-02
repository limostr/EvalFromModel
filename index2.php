
<?php

defined('BASE_PATH')
|| define('BASE_PATH', realpath(dirname(__FILE__)));

include dirname(__FILE__)."/Autoloader.php";
Autoloader::register();


\library\Readers\Configuration::config();

\library\database\dbadapter::connect();


$MonApp = new \library\mvc\Application();
$MonApp->Run();