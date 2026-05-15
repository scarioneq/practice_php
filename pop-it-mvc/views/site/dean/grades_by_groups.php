<h2>Средняя успеваемость по группам</h2>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Название группы</th>
        <th>Кол-во студентов</th>
        <th>Средняя оценка</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($groups as $group): ?>
        <?php
        $allGrades = collect();
        foreach ($group->students as $student) {
            if ($student->grades) {
                $allGrades = $allGrades->merge($student->grades);
            }
        }
        $avgGrade = $allGrades->count() > 0 ? round($allGrades->avg('grade'), 2) : '—';
        ?>
        <tr>
            <td><?= $group->id ?></td>
            <td>
                <a href="<?= app()->route->getUrl('/group-detail') ?>?id=<?= $group->id ?>"
                   style="color: #2c3e50; text-decoration: none; font-weight: 600;">
                    <?= htmlspecialchars($group->name) ?>
                </a>
            </td>
            <td><?= $group->students->count() ?></td>
            <td style="font-weight: bold; color: <?= is_numeric($avgGrade) ? ( $avgGrade >= 4 ? '#27ae60' : ($avgGrade >= 3 ? '#f39c12' : '#e74c3c')) : '#95a5a6' ?>;">
                <?= $avgGrade ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<br>
<a href="<?= app()->route->getUrl('/') ?>">← Назад на главную</a>