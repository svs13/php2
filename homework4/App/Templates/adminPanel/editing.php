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

        <h3>Внесите изменения:</h3>

        <form action="/homework4/adminPanel/save/" method="post">
            <input type="hidden" name="id" value="<?php echo $article->id; ?>">
            <textarea rows="10" cols="45" name="content"><?php echo $article->content; ?></textarea> <br>
            <small>Автор: <?php echo $article->author->name ?? ''; ?></small> <br>

            <button type="submit" name="command" value="edit">Сохранить изменения</button>
            <button type="submit" name="command" value="delete">Удалить новость</button>
        </form>

    </article>

    <br>
    <a href="/homework4/adminPanel/index/">Перейти к списку новостей</a>

</section>


</body>
</html>