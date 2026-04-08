<h2>Группа: <?= htmlspecialchars($group->name) ?></h2>

<section style="margin-top: 20px;">
    <h3>Студенты группы (<?= $group->students->count() ?>)</h3>

    <?php if ($group->students->count() > 0): ?>
        <table border="1" style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="padding: 10px;">ID</th>
                <th style="padding: 10px;">ФИО</th>
                <th style="padding: 10px;">Пол</th>
                <th style="padding: 10px;">Дата рождения</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($group->students as $student): ?>
                <tr>
                    <td style="padding: 10px;"><?= $student->id ?></td>
                    <td style="padding: 10px;">
                        <a href="<?= app()->route->getUrl('/student-disciplines') ?>?id=<?= $student->id ?>"
                           style="color: navy; text-decoration: none;">
                            <?= htmlspecialchars($student->last_name . ' ' . $student->first_name) ?>
                        </a>
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
        <p>В данной группе пока нет студентов.</p>
    <?php endif; ?>
</section>

<section style="margin-top: 30px;">
    <h3>Дисциплины группы (<?= $group->disciplines->count() ?>)</h3>

    <?php if ($group->disciplines->count() > 0): ?>
        <table border="1" style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="padding: 10px;">ID</th>
                <th style="padding: 10px;">Название дисциплины</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($group->disciplines as $discipline): ?>
                <tr>
                    <td style="padding: 10px;"><?= $discipline->id ?></td>
                    <td style="padding: 10px;">
                        <a href="<?= app()->route->getUrl('/discipline-detail') ?>?id=<?= $discipline->id ?>"
                           style="color: navy; text-decoration: none;">
                            <?= htmlspecialchars($discipline->name) ?>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>У данной группы пока нет дисциплин.</p>
    <?php endif; ?>
</section>

<br>
<a href="<?= app()->route->getUrl('/groups') ?>">← Назад к списку групп</a>
