<?php

require __DIR__ . '/autoload.php';

$router = new \App\Router();

if (null !== $router->ctrl) {
    if (null !== $router->action) { //у всех контроллеров всегда одно действие, роутер должен его выбрать, иначе null

        /**
         * @var \App\Controller $ctrl
         */
        $ctrl = new $router->ctrl;

        $res = $ctrl->dispatch();

        if (false !== $res) { //если ошибок нет, то завершаем работу, иначе - на главную

            exit;
        }
    }
}

header('Location: /homework4/');

