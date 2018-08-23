<?php
require __DIR__ . '/autoload.php';

// отлично работает

$transport = (new Swift_SmtpTransport('smtp.mail.ru', 465))
    ->setUsername('no.test@inbox.ru')
    ->setPassword('Y~7KdZ@RzT') // не удаляю, нет смысла.
    ->setEncryption('SSL'); // ЭТО ОБЯЗАТЕЛЬНО

$mailer = new Swift_Mailer($transport);

$message = (new Swift_Message('Проверка отправки письма'))
    ->setFrom(['no.test@inbox.ru' => 'Василий Пупкин']) //от кого, e-mail должен быть верен
    ->setTo(['no.test@inbox.ru']) //куда придёт
    ->setBody('Здравствуйте. Это проверка отправки письма с помощью Swift Mailer');

$result = $mailer->send($message);

var_dump($result); //int 1

