<?php

namespace App\Controllers;

use App\Models\ToDoModel;
use Slim\Views\PhpRenderer;
class MarkAsCompleteController
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
        //if you are looking at this in the future, it would be more efficient to use ARGS

        $dataComplete = $request->getParsedBody();
        $taskId = array_key_first($dataComplete);

        return $this->renderer->render($response->withHeader('Location', '/')->withStatus(301), 'toDoPage.phtml',
            ['markCompleted'=>$this->toDoModel->setComplete($taskId)]);
    }
}