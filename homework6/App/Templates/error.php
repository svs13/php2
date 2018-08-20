<?php
/**
 * @var string $error
 */
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ошибка</title>
</head>
<body>

    <header>
        <h3>Возникла ошибка</h3>
    </header>

    <section>
        <p>Приносим свои извинения за доставленные неудобства.<br>
        Ошибка будет устранена в кратчайшие сроки.</p>

        <h4>Cведения об ошибке: </h4>
        <?php echo $error; ?>
        <p><a href="/homework6/">Перейти на главную</a></p>
    </section>

</body>
</html>

