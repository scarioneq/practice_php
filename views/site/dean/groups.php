<h2>Список групп</h2>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Название группы</th>
        <th>Количество студентов</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($groups as $group): ?>
        <tr>
            <td><?= $group->id ?></td>
            <td>
                <a href="<?= app()->route->getUrl('/group-detail') ?>?id=<?= $group->id ?>"
                   style="color: #2c3e50; font-weight: 600; text-decoration: none;">
                    <?= htmlspecialchars($group->name) ?>
                </a>
            </td>
            <td><?= $group->students->count() ?></td>
            <td>
                <a href="<?= app()->route->getUrl('/group-detail') ?>?id=<?= $group->id ?>"
                   style="color: #27ae60; margin-right: 10px;">
                    [ Просмотр ]
                </a>
                <a href="<?= app()->route->getUrl('/edit-group') ?>?id=<?= $group->id ?>"
                   style="color: #2980b9; margin-right: 10px;">
                    [ Редактировать ]
                </a>
                <a href="<?= app()->route->getUrl('/delete-group') ?>?id=<?= $group->id ?>"
                   onclick="return confirm('Вы точно хотите удалить эту группу?')"
                   style="color: #e74c3c;">
                    [ Удалить ]
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<br>
<a href="<?= app()->route->getUrl('/add-group') ?>">+ Добавить новую группу</a>
