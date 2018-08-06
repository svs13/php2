<?php
/**
 * @var \App\Models\Article[] $news
 */
?>
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

        <h4>Редактирование новостей</h4>

        <p>
            <form action="/homework3/adminPanel.php" method="post" name="addTrain">
                <input type="text" name="content" size="20">
                <button type="submit" name="command" value="add">Добавить</button>
            </form>
        </p>

        <?php foreach ($news as $article) { ?>
            <p>
                <form action="/homework3/adminPanel.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $article->getId(); ?>">
                    <input type="text" name="content" size="20" value="<?php echo $article->content; ?>">
                    <input type="text" readonly size="10" value="<?php echo $article->author->name ?? ''; ?>">
                    <button type="submit" name="command" value="edit">Изменить</button>
                    <button type="submit" name="command" value="delete">Удалить</button>
                </form>
            </p>
        <?php } ?>

    </section>

</body>
</html>