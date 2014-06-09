<?php

require_once(__DIR__.'/../core.php');
require_once($RuntimePath .'/service/Registrar.php');



$s = new ComponentEditor();
$s->Receive();
$s->Process();
$s->Respond();

?>