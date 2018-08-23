<?php

interface LoggerInterface {
    public function log($message);
}

class App
{
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function some($value)
    {
        $this->logger->log('Start');
        echo $value;
        $this->logger->log('Finish');
    }
}


// test
/*
class FakeLogger implements LoggerInterface {
    public function log($message)
    {
        echo $message;
    }
}

$app = new App(new FakeLogger());
*/

//это одноразовый класс, это анонимный класс. Применяется в юнит тестах
$app = new App(new class implements LoggerInterface {
    public function log($value) {
        echo $value;
    }
});

$app->some('some');

//почему это стало возможным?
//действуем принципам солид и описываем в виде интерфейсов
//зависим не от конкретных реализаций, А ОТ ИНТЕРФЕЙСОВ!!!

//нам и этот класс то не нужен FakeLogger - он всего 1 раз используется - для теста
