<?php

namespace App;

class Mailer
{
    protected static $instance;
    protected $mailer;
    protected $email;
    protected $emailRecipient;

    protected function __construct()
    {
        $data = (Config::instance())->data['email'];

        $this->email = $data['name'];
        $this->emailRecipient = (Config::instance())->data['adminEmail']['name'];

        $transport = (new \Swift_SmtpTransport($data['host'], $data['port']))
            ->setUsername($data['login'])
            ->setPassword($data['password'])
            ->setEncryption('SSL');

        $this->mailer = new \Swift_Mailer($transport);
    }

    public static function instance()
    {
        if ( !is_object(self::$instance) ) {
            self::$instance = new Mailer();
        }
        return self::$instance;
    }

    public function send(string $text)
    {
        $message = (new \Swift_Message('Сообщение сервера'))
            ->setFrom([$this->email => 'Сервер'])
            ->setTo([$this->emailRecipient => 'Администратор'])
            ->setBody($text);

        $this->mailer->send($message);
    }
}

