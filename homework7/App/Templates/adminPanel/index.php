<?php
/**
 * @var \Generator $news
 */
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Список новостей</title>
</head>
<body>

    <header>
        <h3>Список новостей</h3>
    </header>
    
    <section>

        <?php
        $functions = require __DIR__ . '/functions.php';
        echo (new \App\AdminDataTable($news, $functions))->render(__DIR__ . '/adminDataTable.php');
        ?>

    </section>
    
    <header>
        <h3>Добавить новую новость</h3>
    </header>
    
    <section>
        <p>
            <form action="/homework7/adminPanel/save/" method="post">
                <textarea rows="10" cols="45" name="content"></textarea> <br>
                <input type="submit" value="Добавить">
            </form>
        </p>
    </section>

</body>
</html>

