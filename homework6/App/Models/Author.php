<?php
namespace App\Models;

use App\Model;

class Author extends Model
{
    protected static $table = 'authors';
    public $name;

    public function fill(array $data)
    {
        $this->validate($data); //если не валидно - throws MultiExceptions
        $this->name = $data['name'];
    }

    /**
     * @param array $data
     * @throws \App\Exceptions\Validation
     */
    protected function validate(array $data)
    {
        $errors = new \App\Exceptions\Validation();

        if (!isset($data['name'])) {
            $errors->add(new \Exception('Отсутствует имя автора'));
        } elseif (!is_string($data['content'])) {
            $errors->add(new \Exception('Автор не содержит текста'));
        } else {
            $value = $data['content'];

            if (strlen($value) < 10) {
                $errors->add(new \Exception('Имя автора слишком мало'));
            }

            if (strlen($value) > 100) {
                $errors->add(new \Exception('Имя автора слишком велико'));
            }

            if (false !== strpos($value, ',,')) {
                $errors->add(new \Exception('Автор содержит ",,"'));
            }

            if (false !== strpos($value, '??')) {
                $errors->add(new \Exception('Статья содержит "??"'));
            }
        }

        if (!$errors->empty()) {
            throw $errors;
        }
    }
}

