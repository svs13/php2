<?php
/**
 * @var \Exception[] $errors
 */
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новость</title>
</head>
<body>

    <header>
        <h3>Сохранение новости <?php echo empty($errors) ? 'выполнено успешно' : 'не выполнено'; ?></h3>
    </header>
    
    <section>
        <?php if ( !empty($errors) ) { ?>
            Возникшие ошибки:
            <ul>
                <?php foreach ($errors as $error) { ?>
                    <li><?php echo $error->getMessage(); ?></li>
                <?php } ?>
            </ul>
        <?php } ?>
        <p><a href="/homework6/adminPanel/index/">Перейти к списку новостей</a></p>
    </section>

</body>
</html>

