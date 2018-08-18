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
                    <?php echo $article->content; ?><br>
                    <small>Автор: <?php echo $article->author->name ?? ''; ?></small>
                </p>

                <p>
                    <form action="/homework4/adminPanel/editing/" method="get">
                        <input type="hidden" name="id" value="<?php echo $article->id; ?>">
                        <input type="submit" value="Изменить">
                    </form>
                </p>

                <p>
                    <form action="/homework4/adminPanel/delete/" method="get">
                        <input type="hidden" name="id" value="<?php echo $article->id; ?>">
                        <input type="submit" value="Удалить">
                    </form>
                </p>

            </article>

        <?php } ?>

    </section>

    <header>
        <h3>Добавить новую новость</h3>
    </header>

    <section>

        <p>
            <form action="/homework4/adminPanel/save/" method="post">
                <textarea rows="10" cols="45" name="content"></textarea> <br>
                <input type="submit" value="Добавить">
            </form>
        </p>

    </section>

</body>
</html>