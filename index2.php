
<?php


include "Autoloader.php";
Autoloader::register();


\library\Readers\Configuration::config();

\library\database\dbadapter::connect();


$MonApp = new \library\mvc\Application();
$MonApp->Run();