<?php
declare(strict_types=1);

use App\Controllers\CoursesAPIController;
use Slim\App;
use Slim\Views\PhpRenderer;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use App\Controllers\ToDoController;
use App\Controllers\CompletedToDoController;
use App\Controllers\SetToDoController;
use App\Controllers\MarkAsCompleteController;
use App\Controllers\DeleteController;
use App\Controllers\EditToDoController;
use App\Controllers\SingleToDoController;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', ToDoController::class);
    $app->get('/complete', CompletedToDoController::class);
    $app->post('/add', SetToDoController::class);
    $app->post('/done', MarkAsCompleteController::class);
    $app->post('/delete', DeleteController::class);
    $app->post('/edit/{id}', EditToDoController::class);
    $app->get('/edit/{id}', SingleToDoController::class);
};
