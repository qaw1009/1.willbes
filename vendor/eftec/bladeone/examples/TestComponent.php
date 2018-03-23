<?php
/**
 * Copyright (c) 2017 Jorge Patricio Castro Castillo MIT License.
 */
include "../BladeOne.php";
use eftec\bladeone;

$views = __DIR__ . '/views';
$compiledFolder = __DIR__ . '/compiled';
$blade=new bladeone\BladeOne($views,$compiledFolder);
define("BLADEONE_MODE",1); // (optional) 1=forced (test),2=run fast (production), 0=automatic, default value.



echo $blade->run("TestComponent.component",[]);
