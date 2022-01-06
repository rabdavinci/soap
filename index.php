<?php

require '.Wallets.php';

$service = new Wallets();

$server = new SoapServer('ProviderWebService.wsdl');
$server->setObject($service);
$server->handle();
