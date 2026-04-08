<h2>Список групп</h2>

<table border="1" style="width: 100%; border-collapse: collapse; text-align: left;">
    <thead>
    <tr style="background-color: #f2f2f2;">
        <th style="padding: 10px;">ID</th>
        <th style="padding: 10px;">Название группы</th>
        <th style="padding: 10px;">Количество студентов</th>
        <th style="padding: 10px;">Действия</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($groups as $group): ?>
        <tr>
            <td style="padding: 10px;"><?= $group->id ?></td>
            <td style="padding: 10px;">
                <a href="<?= app()->route->getUrl('/group-detail') ?>?id=<?= $group->id ?>"
                   style="color: navy; text-decoration: none; font-weight: bold;">
                    <?= htmlspecialchars($group->name) ?>
                </a>
            </td>
            <td style="padding: 10px;">
                <?= $group->students->count() ?>
            </td>
            <td style="padding: 10px;">
                <a href="<?= app()->route->getUrl('/group-detail') ?>?id=<?= $group->id ?>"
                   style="color: green; text-decoration: none; margin-right: 10px;">
                    [ Просмотр ]
                </a>
                <a href="<?= app()->route->getUrl('/edit-group') ?>?id=<?= $group->id ?>"
                   style="color: blue; text-decoration: none; margin-right: 10px;">
                    [ Редактировать ]
                </a>
                <a href="<?= app()->route->getUrl('/delete-group') ?>?id=<?= $group->id ?>"
                   onclick="return confirm('Вы точно хотите удалить эту группу?')"
                   style="color: red; text-decoration: none;">
                    [ Удалить ]
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<br>
<a href="<?= app()->route->getUrl('/add-group') ?>">+ Добавить новую группу</a>
