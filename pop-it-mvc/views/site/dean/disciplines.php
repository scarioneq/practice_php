<h2>Список дисциплин</h2>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Название дисциплины</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($disciplines as $discipline): ?>
        <tr>
            <td><?= $discipline->id ?></td>
            <td>
                <a href="<?= app()->route->getUrl('/discipline-detail') ?>?id=<?= $discipline->id ?>"
                   style="color: #2c3e50; font-weight: 600; text-decoration: none;">
                    <?= htmlspecialchars($discipline->name) ?>
                </a>
            </td>
            <td>
                <a href="<?= app()->route->getUrl('/discipline-detail') ?>?id=<?= $discipline->id ?>"
                   style="color: #27ae60; margin-right: 10px;">
                    [ Просмотр ]
                </a>
                <a href="<?= app()->route->getUrl('/edit-discipline') ?>?id=<?= $discipline->id ?>"
                   style="color: #2980b9; margin-right: 10px;">
                    [ Редактировать ]
                </a>
                <a href="<?= app()->route->getUrl('/delete-discipline') ?>?id=<?= $discipline->id ?>"
                   onclick="return confirm('Вы точно хотите удалить эту дисциплину?')"
                   style="color: #e74c3c;">
                    [ Удалить ]
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<br>
<a href="<?= app()->route->getUrl('/add-discipline') ?>">+ Добавить новую дисциплину</a>
