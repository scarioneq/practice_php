<h2>Дисциплина: <?= htmlspecialchars($discipline->name) ?></h2>

<section style="margin-top: 24px;">
    <h3>Группы, изучающие дисциплину (<?= $discipline->groups->count() ?>)</h3>

    <?php if ($discipline->groups->count() > 0): ?>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Название группы</th>
                <th>Количество студентов</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($discipline->groups as $group): ?>
                <tr>
                    <td><?= $group->id ?></td>
                    <td>
                        <a href="<?= app()->route->getUrl('/group-detail') ?>?id=<?= $group->id ?>"
                           style="color: #2c3e50; text-decoration: none; font-weight: 600;">
                            <?= htmlspecialchars($group->name) ?>
                        </a>
                    </td>
                    <td><?= $group->students->count() ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="color: #7f8c8d;">Нет групп, изучающих эту дисциплину.</p>
    <?php endif; ?>
</section>

<section style="margin-top: 30px;">
    <h3>Студенты, изучающие дисциплину (<?= count($discipline->students) ?>)</h3>

    <?php if (count($discipline->students) > 0): ?>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>ФИО</th>
                <th>Группа</th>
                <th>Пол</th>
                <th>Дата рождения</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($discipline->students as $student): ?>
                <tr>
                    <td><?= $student->id ?></td>
                    <td><?= htmlspecialchars($student->last_name . ' ' . $student->first_name) ?></td>
                    <td><?= $student->group ? htmlspecialchars($student->group->name) : '—' ?></td>
                    <td><?= $student->gender === 'male' ? 'М' : 'Ж' ?></td>
                    <td><?= date('d.m.Y', strtotime($student->date_of_birth)) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="color: #7f8c8d;">Нет студентов, изучающих эту дисциплину.</p>
    <?php endif; ?>
</section>

<br>
<a href="<?= app()->route->getUrl('/disciplines') ?>">← Назад к списку дисциплин</a>
