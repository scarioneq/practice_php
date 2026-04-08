<h2>Дисциплина: <?= htmlspecialchars($discipline->name) ?></h2>

<section style="margin-top: 20px;">
    <h3>Группы, изучающие дисциплину (<?= $discipline->groups->count() ?>)</h3>

    <?php if ($discipline->groups->count() > 0): ?>
        <table border="1" style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="padding: 10px;">ID</th>
                <th style="padding: 10px;">Название группы</th>
                <th style="padding: 10px;">Количество студентов</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($discipline->groups as $group): ?>
                <tr>
                    <td style="padding: 10px;"><?= $group->id ?></td>
                    <td style="padding: 10px;">
                        <a href="<?= app()->route->getUrl('/group-detail') ?>?id=<?= $group->id ?>"
                           style="color: navy; text-decoration: none;">
                            <?= htmlspecialchars($group->name) ?>
                        </a>
                    </td>
                    <td style="padding: 10px;">
                        <?= $group->students->count() ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Нет групп, изучающих эту дисциплину.</p>
    <?php endif; ?>
</section>

<section style="margin-top: 30px;">
    <h3>Студенты, изучающие дисциплину (<?= count($discipline->students) ?>)</h3>

    <?php if (count($discipline->students) > 0): ?>
        <table border="1" style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="padding: 10px;">ID</th>
                <th style="padding: 10px;">ФИО</th>
                <th style="padding: 10px;">Группа</th>
                <th style="padding: 10px;">Пол</th>
                <th style="padding: 10px;">Дата рождения</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($discipline->students as $student): ?>
                <tr>
                    <td style="padding: 10px;"><?= $student->id ?></td>
                    <td style="padding: 10px;">
                        <?= htmlspecialchars($student->last_name . ' ' . $student->first_name) ?>
                    </td>
                    <td style="padding: 10px;">
                        <?= $student->group ? htmlspecialchars($student->group->name) : '—' ?>
                    </td>
                    <td style="padding: 10px;">
                        <?= $student->gender === 'male' ? 'М' : 'Ж' ?>
                    </td>
                    <td style="padding: 10px;">
                        <?= date('d.m.Y', strtotime($student->date_of_birth)) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Нет студентов, изучающих эту дисциплину.</p>
    <?php endif; ?>
</section>

<br>
<a href="<?= app()->route->getUrl('/disciplines') ?>">← Назад к списку дисциплин</a>
