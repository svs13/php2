<?php

class MultiException extends Exception
{
    protected $errors;

    public function add(Exception $exception)
    {
        $this->errors[] = $exception;
    }

    public function empty()
    {
        return empty($this->errors);
    }

    public function all()
    {
        return $this->errors;
    }

}



function validate($password)
{
    $errors = new MultiException();

    if (false === strpos($password, '0')) {
        $errors->add(new Exception('Нет цифры 0!'));
    }
    if (strlen($password)<6) {
        $errors->add(new Exception('Слишком короткий пароль'));
    }

    if (!$errors->empty()) {
        throw $errors; //кинуть это можем, т.к. наследовали от класса Exception
    }

    return true;
}


try {
    validate('123');
} catch (MultiException $errors) {
    foreach ($errors->all() as $error) {

        /**
         * @var MultiException $error
         */
        echo 'getMessage() Получает сообщение ошибки';
        var_dump($error->getMessage()); //Получает сообщение ошибки
        echo 'getCode() Возвращает код исключения';
        var_dump($error->getCode());    //Возвращает код исключения
        echo 'getFile() Возвращает файл, в котором произошло исключение';
        var_dump($error->getFile());    //Возвращает файл, в котором произошло исключение
        echo 'getLine() Получает строку скрипта, в которой данный объект был выброшен';
        var_dump($error->getLine());    //Получает строку скрипта, в которой данный объект был выброшен
        echo 'getTrace()Возвращает трассировку стека';
        var_dump($error->getTrace());   //Возвращает трассировку стека
        echo 'getTraceAsString() Получает результаты трассировки стека в виде строки';
        var_dump($error->getTraceAsString()); //Получает результаты трассировки стека в виде строки
        echo 'getPrevious() Возвращает предыдущий Throwable';
        var_dump($error->getPrevious()); //Возвращает предыдущий Throwable

    }
}





