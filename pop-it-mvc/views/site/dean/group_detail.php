<h2>Группа: <?= htmlspecialchars($group->name) ?></h2>

<section style="margin-top: 24px;">
    <h3>Студенты группы (<?= $group->students->count() ?>)</h3>

    <?php if ($group->students->count() > 0): ?>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>ФИО</th>
                <th>Пол</th>
                <th>Дата рождения</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($group->students as $student): ?>
                <tr>
                    <td><?= $student->id ?></td>
                    <td>
                        <a href="<?= app()->route->getUrl('/student-disciplines') ?>?id=<?= $student->id ?>"
                           style="color: #2c3e50; text-decoration: none;">
                            <?= htmlspecialchars($student->last_name . ' ' . $student->first_name) ?>
                        </a>
                    </td>
                    <td><?= $student->gender === 'male' ? 'М' : 'Ж' ?></td>
                    <td><?= date('d.m.Y', strtotime($student->date_of_birth)) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="color: #7f8c8d;">В данной группе пока нет студентов.</p>
    <?php endif; ?>
</section>

<section style="margin-top: 30px;">
    <h3>Дисциплины группы (<?= $group->disciplines->count() ?>)</h3>

    <?php if ($group->disciplines->count() > 0): ?>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Название дисциплины</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($group->disciplines as $discipline): ?>
                <tr>
                    <td><?= $discipline->id ?></td>
                    <td>
                        <a href="<?= app()->route->getUrl('/discipline-detail') ?>?id=<?= $discipline->id ?>"
                           style="color: #2c3e50; text-decoration: none;">
                            <?= htmlspecialchars($discipline->name) ?>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="color: #7f8c8d;">У данной группы пока нет дисциплин.</p>
    <?php endif; ?>
</section>

<br>
<a href="<?= app()->route->getUrl('/groups') ?>">← Назад к списку групп</a>
