<?php

require('secure/acceso.php');

$access = new acceso('localhost', '4dm1nC0nci3rg320', 'MKdY+Q9M*Aa%', '65MappConcierge2020');
$access->conecta();

$events = $access->loadEvents();

$access->desconecta();