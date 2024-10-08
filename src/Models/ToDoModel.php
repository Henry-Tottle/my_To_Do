<?php

namespace App\Models;
use PDO;

class ToDoModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function getToDos()
    {
        $query = $this->db->prepare('SELECT `id`, `user_id`, `to_do_message`, `completed`, `created`, `deadline`  FROM `to_do` WHERE `completed` = 0 ORDER BY `created` ASC');
        $query->execute();
        return $query->fetchAll();
    }

    public function getToDo($id)
    {
        $query = $this->db->prepare('SELECT `id`, `user_id`, `to_do_message`, `completed`, `created`, `deadline`  FROM `to_do` WHERE `id` = :id');
        $query->execute(['id'=>$id]);
        return $query->fetch();
    }

    public function getCompleted()
    {
        $query = $this->db->prepare('SELECT `id`, `user_id`, `to_do_message`, `completed`, `created`  FROM `to_do` WHERE `completed` = 1');
        $query->execute();
        return $query->fetchAll();
    }

    public function setToDos($newToDo, $date)
    {
        $query = $this->db->prepare('INSERT INTO `to_do` (`to_do_message`, `deadline`) VALUES (:message, :deadline)');
        $query->execute(['message'=>$newToDo, 'deadline'=>$date]);
    }

    public function setComplete($complete)
    {
        $query = $this->db->prepare('UPDATE `to_do` SET `completed` = 1 WHERE `id` = :id');
        $query->execute(['id'=>$complete]);
    }

    public function deleteToDo($id)
    {
        $query = $this->db->prepare('DELETE FROM `to_do` WHERE `id` = :id');
        $query->execute(['id'=>$id]);
    }

    public function editToDo($id, $updatedMessage, $updatedDate)
    {
        $query = $this->db->prepare('UPDATE `to_do` SET `to_do_message` = :updatedMessage, `deadline` = :updatedDate WHERE `id` = :id');
        $query->execute(['updatedMessage'=>$updatedMessage, 'id'=>$id, 'updatedDate' => $updatedDate]);
    }
}