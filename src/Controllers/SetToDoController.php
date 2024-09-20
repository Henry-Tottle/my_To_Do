<?php

namespace App\Controllers;
use App\Models\ToDoModel;
use Slim\Views\PhpRenderer;

class SetToDoController
{
    private ToDoModel $toDoModel;
    private PhpRenderer $renderer;

    public function __construct(ToDoModel $toDoModel, PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
        $this->toDoModel = $toDoModel;
    }

    public function __invoke($request, $response)
    {
        $data = $request->getParsedBody();
        $this->toDoModel->setToDos($data['newToDo']);
        return $this->renderer->render($response->withHeader('Location', '/')->withStatus(301), 'toDoPage.phtml');

    }

}