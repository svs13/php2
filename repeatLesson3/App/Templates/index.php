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

    <h1>Товары</h1>


    <table border="1">
        <tr>
            <th>Товар</th>
            <th>Цена</th>
        <tr>
        <?php foreach ($this->products as $product) : ?>
        <tr>
            <td><?php echo $product->name; ?></td>
            <td><?php echo $product->price; ?></td>
        </tr>
        <?php endforeach; ?>

    </table>
</body>
</html>