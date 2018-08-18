<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админ-панель</title>
</head>
<body>

    <header>
        <h3>Админ-панель</h3>
    </header>

    <section>

        <h4>Добавление новости</h4>

        <p>
            <form action="/homework2/adminPanel/save.php" method="post">
                <input type="text" name="content" size="20">
                <input type="submit" value="Добавить">
            </form>
        </p>

        <h4>Список новостей</h4>

        <?php foreach ($news as $article) { ?>
            <p>
                <form action="/homework2/adminPanel/save.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $article->id; ?>">
                    <input type="text" name="content" size="20" value="<?php echo $article->content; ?>">
                    <input type="submit" value="Изменить">
                </form>
            </p>
            <p>
                <form action="/homework2/adminPanel/delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $article->id; ?>">
                    <input type="submit" value="Удалить">
                </form>
            </p>
        <?php } ?>

        <br>

        <p><a href="/homework2/index.php">Перейти на главную</a></p>

    </section>

</body>
</html>