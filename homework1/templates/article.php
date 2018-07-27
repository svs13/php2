<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $header; ?></title>
</head>
<body>

<header>
    <h3><?php echo $header; ?></h3>
</header>

<section>

    <article>
        <?php echo $content; ?>
        <br>
        <small>Автор: <?php echo $author; ?></small>
    </article>

</section>

</body>
</html>