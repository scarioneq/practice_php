<h2>Список студентов</h2>

<?php if (isset($message)): ?>
    <p style="color: #27ae60; font-weight: bold;"><?= $message ?></p>
<?php endif; ?>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>ФИО</th>
        <th>Пол</th>
        <th>Дата рождения</th>
        <th>Группа</th>
        <th>Город</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($students as $student): ?>
        <tr>
            <td><?= $student->id ?></td>
            <td><?= htmlspecialchars($student->last_name . ' ' . $student->first_name . ' ' . $student->patronymic) ?></td>
            <td><?= $student->gender === 'male' ? 'М' : 'Ж' ?></td>
            <td><?= date('d.m.Y', strtotime($student->date_of_birth)) ?></td>
            <td><?= $student->group ? htmlspecialchars($student->group->name) : '—' ?></td>
            <td><?= $student->address ? htmlspecialchars($student->address->city) : '—' ?></td>
            <td>
                <a href="<?= app()->route->getUrl('/student-disciplines') ?>?id=<?= $student->id ?>"
                   style="color: #27ae60; margin-right: 10px;">
                    [ Дисциплины ]
                </a>
                <a href="<?= app()->route->getUrl('/edit-student') ?>?id=<?= $student->id ?>"
                   style="color: #2980b9; margin-right: 10px;">
                    [ Редактировать ]
                </a>
                <a href="<?= app()->route->getUrl('/delete-student') ?>?id=<?= $student->id ?>"
                   onclick="return confirm('Вы точно хотите удалить этого студента?')"
                   style="color: #e74c3c;">
                    [ Удалить ]
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<br>
<a href="<?= app()->route->getUrl('/add-student') ?>">+ Добавить нового студента</a>
