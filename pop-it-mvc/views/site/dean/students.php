<h2>Список студентов</h2>

<?php if (isset($message)): ?>
    <p style="color: green;"><?= $message ?></p>
<?php endif; ?>

<table border="1" style="width: 100%; border-collapse: collapse; text-align: left;">
    <thead>
    <tr style="background-color: #f2f2f2;">
        <th style="padding: 10px;">ID</th>
        <th style="padding: 10px;">ФИО</th>
        <th style="padding: 10px;">Пол</th>
        <th style="padding: 10px;">Дата рождения</th>
        <th style="padding: 10px;">Группа</th>
        <th style="padding: 10px;">Город</th>
        <th style="padding: 10px;">Действия</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($students as $student): ?>
        <tr>
            <td style="padding: 10px;"><?= $student->id ?></td>
            <td style="padding: 10px;">
                <?= htmlspecialchars($student->last_name . ' ' . $student->first_name . ' ' . $student->patronymic) ?>
            </td>
            <td style="padding: 10px;">
                <?= $student->gender === 'male' ? 'М' : 'Ж' ?>
            </td>
            <td style="padding: 10px;">
                <?= date('d.m.Y', strtotime($student->date_of_birth)) ?>
            </td>
            <td style="padding: 10px;">
                <?= $student->group ? htmlspecialchars($student->group->name) : '—' ?>
            </td>
            <td style="padding: 10px;">
                <?= $student->address ? htmlspecialchars($student->address->city) : '—' ?>
            </td>
            <td style="padding: 10px;">
                <a href="<?= app()->route->getUrl('/edit-student') ?>?id=<?= $student->id ?>"
                   style="color: blue; text-decoration: none; margin-right: 10px;">
                    [ Редактировать ]
                </a>
                <a href="<?= app()->route->getUrl('/delete-student') ?>?id=<?= $student->id ?>"
                   onclick="return confirm('Вы точно хотите удалить этого студента?')"
                   style="color: red; text-decoration: none;">
                    [ Удалить ]
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<br>
<a href="<?= app()->route->getUrl('/add-student') ?>">+ Добавить нового студента</a>
