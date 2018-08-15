<?php

namespace App;

class Router
{
    public $uriPath;
    public $ctrl = null;
    public $action = null;

    public function __construct()
    {
        //Роутер должен определить имя контроллера и имя действия

        $this->uriPath = $this->getUriPath();

        $parts = $this->getPartsUriPath();

        if (false !== $parts) {

            $ctrl = $parts[0] ?: 'Index';

            $this->ctrl = '\App\Controllers\\' . $ctrl;

            if ( !$this->checkCtrl() ) { //если контроллера не существует

                $this->ctrl = null;
            }

            if ( null !== $this->ctrl) {

                $action = $parts[1];

                if ('' === $action) { //если действие не задано - задаю по умолчанию
                    $action = 'action';
                }

                if ('action' === $action) { //у всех контроллеров действие всегда одно 'action'
                    $this->action = $action;
                }
            }
        }

    }


    /**
     * @return string|null
     */
    protected function getUriPath()
    {
        $uriPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //получаю только путь. /homework5/admin/index/action

        if (false !== $uriPath) {

            return $uriPath;
        }

    }


    /**
     * @return array|false
     */
    protected function getPartsUriPath()
    {
        //Адрес вида /XXX/YYY/ZZZ должен транслироваться
        // в контроллер XXX\YYY (вложенность пространств имен неограничена)
        // и действие ZZZ

        if (null === $this->uriPath) {
            return false;
        }

        $parts = explode('/', $this->uriPath); //разбиваю. ['', 'homework5', 'admin', 'index', 'action']

        if ( false === $parts ) {
            return false;
        }

        if ( !isset( $parts[0], $parts[1] ) ) {
            return false;
        }

        unset($parts[0], $parts[1]); //удаляю '' и 'homework5'. ['admin', 'index', 'action']

        $action = array_pop($parts); //удаляю последний элемент массива, получив его значение. ['admin', 'index']

        foreach ($parts as $index => $value) { //преобразую "имя" в "Имя". ['Admin', 'Index']
            $parts[$index] = ucfirst($value);
        }

        $name = implode('\\', $parts); //соединяю. 'Admin\Index'

        return [$name, $action];
    }

    protected function checkCtrl() //проверка существования файла класса контроллера
    {
        $path = realpath(__DIR__ . '/..' . str_replace('\\', '/', $this->ctrl) . '.php');

        return file_exists($path);
    }

}