<?php

namespace App\Controllers;

use App\Models\ToDoModel;
use Slim\Views\PhpRenderer;
class DeleteController
{
    private ToDoModel $toDoModel;
    private PhpRenderer $renderer;

    public function __construct(ToDoModel $toDoModel, PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
        $this->toDoModel = $toDoModel;
    }

    public function __invoke($request, $response, $args)
    {
        //if you are looking at this in the future, it would be more efficient to use ARG
        $delete = $request->getParsedBody();
        $taskId = array_key_first($delete);
        return $this->renderer->render($response->withHeader('Location', '/complete')->withStatus(301), 'completedPage.phtml',['markDeleted'=>$this->toDoModel->deleteToDo($taskId)]);
    }
}