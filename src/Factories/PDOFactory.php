<?php

namespace App\Factories;
use PDO;
use Psr\Container\ContainerInterface;

class PDOFactory
{
    //magic method is run when you call an object as some kind of function
    public function __invoke(ContainerInterface $container): PDO
    {

        $settings = $container->get('settings');
        $dbSettings = $settings['db'];

        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
        ];
        return new PDO($dbSettings['host'] . $dbSettings['name'], $dbSettings['user'], $dbSettings['password'], $options);
    }
}