<?php
/**
 * @var \App\Models\Article $article
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

    <section>
        <article>
            <?php echo $article->content; ?>
            <br>
            <small>Автор: <?php echo $article->author->name ?? ''; ?></small>
        </article>
    </section>

</body>
</html>

