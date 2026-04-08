<h2>Управление сотрудниками деканата</h2>

<?php if (isset($message)): ?>
    <p style="color: green;"><?= $message ?></p>
<?php endif; ?>

<table border="1" style="width: 100%; border-collapse: collapse; text-align: left;">
    <thead>
    <tr style="background-color: #f2f2f2;">
        <th style="padding: 10px;">ID</th>
        <th style="padding: 10px;">Имя</th>
        <th style="padding: 10px;">Логин</th>
        <th style="padding: 10px;">Роль</th>
        <th style="padding: 10px;">Действие</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td style="padding: 10px;"><?= $user->id ?></td>
            <td style="padding: 10px;"><?= $user->name ?></td>
            <td style="padding: 10px;"><?= $user->login ?></td>
            <td style="padding: 10px;">
                <?= $user->is_admin ? '<b>Админ</b>' : 'Сотрудник' ?>
            </td>
            <td style="padding: 10px;">
                <?php if (app()->auth::user()->id !== $user->id): ?>
                    <a href="<?= app()->route->getUrl('/deleteuser') ?>?id=<?= $user->id ?>"
                       onclick="return confirm('Вы точно хотите удалить этого сотрудника?')"
                       style="color: red; text-decoration: none;">
                        [ Удалить ]
                    </a>
                <?php else: ?>
                    <span style="color: gray;">(Вы)</span>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<br>
<a href="<?= app()->route->getUrl('/adduser') ?>">+ Добавить нового сотрудника</a>

