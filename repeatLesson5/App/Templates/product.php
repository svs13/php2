<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP-2</title>
</head>
<body>

    <h1>Товар "<?php echo $product->name; ?>"</h1>


    <table border="1">
        <tr>
            <th>Товар</th>
            <th>Цена</th>
        <tr>
        <tr>
            <td>
                <a href="/repeatLesson4/product.php?id=<?php echo $product->id; ?>">
                    <?php echo $product->name; ?>
                </a>
            </td>
            <td><?php echo $product->price; ?></td>
        </tr>

    </table>
</body>
</html>