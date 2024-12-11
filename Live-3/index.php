<?php

use App\Routing\Router;

require_once 'vendor/autoload.php';

$router = new Router($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

// /homepage/action -> App\Controller\HomepageController::action
// /mon-super/action -> App\Controller\MonSuperController::action
// /users/admin/action -> App\Controller\Users\AdminController::action

$data = $router->render();
$page = $data['page'];

require_once 'views/base.php';