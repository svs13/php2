<?php

require __DIR__ . '/autoload.php';

$router = new \App\Router();

if ( !$router->isDefined() ) {
    header('Location: /homework7/');
    exit;
}

try {
    /**
     * @var \App\Controller $ctrl
     */
    $ctrl = new $router->ctrl;
    $ctrl->dispatch();

} catch (\App\Exceptions\E404Exception $exception) {
    (new \App\Log())->addException($exception);

    $ctrl = new \App\Controllers\Error();
    $ctrl->message = $exception->getMessage();
    $ctrl->htmlResponseCode = 404;
    $ctrl->dispatch();
} catch (\App\Exceptions\DbException $exception) {
    (new \App\Log())->addException($exception);

    if (42 === $exception->getCode()) { //Ошибка соединения
        (\App\Mailer::instance())->send($exception->getMessage());
    }

    $ctrl = new \App\Controllers\Error();
    $ctrl->message = $exception->getMessage();
    $ctrl->dispatch();
}


