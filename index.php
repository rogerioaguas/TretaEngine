<?php
include_once 'app/engine/Define.php';
include_once 'app/engine/Treta_Engine.php';
include_once 'app/engine/Controller.php';
include_once 'app/engine/Config.php';
include_once 'app/engine/Model.php';
include_once 'app/engine/Loader.php';

$start = new Treta_Engine();
$start->run();