<h2>Управление сотрудниками деканата</h2>

<?php if (isset($message)): ?>
    <p style="color: #27ae60; font-weight: bold;"><?= $message ?></p>
<?php endif; ?>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Имя</th>
        <th>Логин</th>
        <th>Роль</th>
        <th>Действие</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user->id ?></td>
            <td><?= $user->name ?></td>
            <td><?= $user->login ?></td>
            <td><?= $user->is_admin ? '<b>Админ</b>' : 'Сотрудник' ?></td>
            <td>
                <?php if (app()->auth::user()->id !== $user->id): ?>
                    <a href="<?= app()->route->getUrl('/deleteuser') ?>?id=<?= $user->id ?>"
                       onclick="return confirm('Вы точно хотите удалить этого сотрудника?')"
                       style="color: #e74c3c;">
                        [ Удалить ]
                    </a>
                <?php else: ?>
                    <span style="color: #95a5a6;">(Вы)</span>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<br>
<a href="<?= app()->route->getUrl('/adduser') ?>">+ Добавить нового сотрудника</a>
