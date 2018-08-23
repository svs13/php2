<?php

require __DIR__ . '/autoload.php';

$router = new \App\Router();

if (null === $router->ctrl) {
    header('Location: /homework6/');
    exit;
}

if (null === $router->action) {
    header('Location: /homework6/');
    exit;
}

try {
    /**
     * @var \App\Controller $ctrl
     */
    $ctrl = new $router->ctrl;
    $res = $ctrl->dispatch();

    if (false === $res) { //если ошибка, то на главную
        header('Location: /homework6/');
        exit;
    }
} catch (\App\Exceptions\DbNotFoundRecord $exception) {
    (new \App\Log())->addException($exception);

    $ctrl = new \App\Controllers\Error();
    $ctrl->message = $exception->getMessage();
    $ctrl->htmlResponseCode = 404;
    $ctrl->dispatch();
} catch (\App\Exceptions\Db $exception) {
    (new \App\Log())->addException($exception);

    if (42 === $exception->getCode()) { //Ошибка соединения
        (\App\Mailer::instance())->send($exception->getMessage());
    }

    $ctrl = new \App\Controllers\Error();
    $ctrl->message = $exception->getMessage();
    $ctrl->dispatch();
}


