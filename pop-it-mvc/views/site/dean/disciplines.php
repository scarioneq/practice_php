<h2>Список дисциплин</h2>

<table border="1" style="width: 100%; border-collapse: collapse; text-align: left;">
    <thead>
    <tr style="background-color: #f2f2f2;">
        <th style="padding: 10px;">ID</th>
        <th style="padding: 10px;">Название дисциплины</th>
        <th style="padding: 10px;">Действия</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($disciplines as $discipline): ?>
        <tr>
            <td style="padding: 10px;"><?= $discipline->id ?></td>
            <td style="padding: 10px;"><?= htmlspecialchars($discipline->name) ?></td>
            <td style="padding: 10px;">
                <a href="<?= app()->route->getUrl('/discipline-detail') ?>?id=<?= $discipline->id ?>"
                   style="color: green; text-decoration: none; margin-right: 10px;">
                    [ Просмотр ]
                </a>
                <a href="<?= app()->route->getUrl('/edit-discipline') ?>?id=<?= $discipline->id ?>"
                   style="color: blue; text-decoration: none; margin-right: 10px;">
                    [ Редактировать ]
                </a>
                <a href="<?= app()->route->getUrl('/delete-discipline') ?>?id=<?= $discipline->id ?>"
                   onclick="return confirm('Вы точно хотите удалить эту дисциплину?')"
                   style="color: red; text-decoration: none;">
                    [ Удалить ]
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<br>
<a href="<?= app()->route->getUrl('/add-discipline') ?>">+ Добавить новую дисциплину</a>
