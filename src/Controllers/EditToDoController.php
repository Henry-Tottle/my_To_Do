<?php

namespace App\Controllers;

use App\Models\ToDoModel;
use Slim\Views\PhpRenderer;
class EditToDoController
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
        $editData = $request->getParsedBody();
        $id = array_key_first($editData);
        $message = $editData[$id];
        return $this->renderer->render($response->withHeader('Location', "/")->withStatus(301),
            'editPage.phtml',['editToDo'=>$this->toDoModel->editToDo($id, $message)]);
    }
}