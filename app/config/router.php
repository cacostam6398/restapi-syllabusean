<?php
use Phalcon\Mvc\Micro\Collection as MicroCollection;

$orders = new MicroCollection();

// Establece el manejador principal. Por ejemplo, la instancia de un controlador
//$orders->setHandler(new IndexController());
$orders->setHandler('IndexController', true);

// Establece un prefijo común para todas la rutas
$orders->setPrefix('/api/index');

// Usa el método 'index' en OrdersController
//$orders->get('/', 'index');

// Usa el método 'obtener' en IndexController
$orders->post('/aut', 'autenticar');

$app->mount($orders);