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

    <header>
        <h3>Редактирование новости</h3>
    </header>
    
    <section>
        <article>
            <form action="/homework7/adminPanel/save/" method="post">
                <input type="hidden" name="id" value="<?php echo $article->id; ?>">
                <textarea rows="10" cols="45" name="content"><?php echo $article->content; ?></textarea> <br>
                <small>Автор: <?php echo $article->author->name ?? ''; ?></small><br><br>
                <input type="submit" value="Сохранить">
            </form>
        </article>
        <br>
        <a href="/homework7/adminPanel/index/">Перейти к списку новостей</a>
    </section>

</body>
</html>

