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
    <title>Список новостей</title>
</head>
<body>

    <header>
        <h3>Список новостей</h3>
    </header>

    <section>

        <?php foreach ($news as $article) { ?>

            <article>
                <p>
                    <a href="/homework3/article.php?id=<?php echo $article->id; ?>">
                        <?php echo $article->content; ?>
                        <br>
                        <small>Автор: <?php echo $article->author->name ?? ''; ?></small>
                    </a>
                </p>
            </article>

        <?php } ?>

    </section>

    <header>
        <h3>Админ-панель</h3>
    </header>

    <section>

        <a href="/homework3/adminPanel/index.php">Перейти в админ-панель</a>

    </section>

</body>
</html>