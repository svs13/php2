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
        <h3>Выберете новость для редактирования:</h3>
    </header>

    <section>

        <?php foreach ($news as $article) { ?>

            <article>
                <a href="/homework4/adminPanel/editing/?id=<?php echo $article->id; ?>">
                    <?php echo $article->content; ?>
                    <br>
                    <small>Автор: <?php echo $article->author->name ?? ''; ?></small>
                </a>
            </article>
            <br>

        <?php } ?>

        <article>
            <a href="/homework4/adminPanel/editing/?id=new">
                Новая новость
            </a>
        </article>


    </section>

</body>
</html>