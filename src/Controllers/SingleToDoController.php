<?php

namespace App\Controllers;

use App\Models\ToDoModel;
use Slim\Views\PhpRenderer;
class SingleToDoController
{
    private ToDoModel $toDoModel;
    private PhpRenderer $renderer;

    public function __construct(ToDoModel $toDoModel,PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
        $this->toDoModel = $toDoModel;
    }

    public function __invoke($request, $response, $args)
    {


        return $this->renderer->render($response->withHeader('Location', '/'), 'editPage.phtml',
            ['singleToDoArray'=>$this->toDoModel->getToDo($args['id'])]);
    }
}