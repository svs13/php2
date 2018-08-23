<?php
/**
 * @var \Generator $models
 * @var callable[] $functions
 */
?>
<table border="1" cellspacing="0">

    <tr>
        <th>id</th>
        <th>Содержимое</th>
        <th>Автор</th>
        <th colspan="2">Действие</th>
    </tr>
    <?php foreach ($models as $model) { ?>
        <tr>
            <?php foreach ($functions as $function) { ?>
                <td><?php echo $function($model); ?></td>
            <?php } ?>

            <td>
                <form action="/homework7/adminPanel/editing/" method="get">
                    <input type="hidden" name="id" value="<?php echo $model->id; ?>">
                    <input type="submit" value="Изменить">
                </form>
            </td>
            <td>
                <form action="/homework7/adminPanel/delete/" method="get">
                    <input type="hidden" name="id" value="<?php echo $model->id; ?>">
                    <input type="submit" value="Удалить">
                </form>
            </td>
        </tr>
    <?php } ?>

</table>
