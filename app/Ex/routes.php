<?php

$dm = config('app.url');
$routes = __DIR__.'*/route.php';
foreach (glob(__DIR__.'/*',GLOB_ONLYDIR) as $dir) {
    include_once $dir.'/go.php';
}
?>
