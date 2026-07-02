<h2>Успеваемость студента</h2>

<div style="margin-bottom: 20px; padding: 12px 16px; background: #ecf0f1; border-radius: 6px;">
    <strong><?= htmlspecialchars($student->last_name . ' ' . $student->first_name . ' ' . $student->patronymic) ?></strong>
    <?php if ($student->group): ?>
        — Группа: <a href="<?= app()->route->getUrl('/group-detail') ?>?id=<?= $student->group->id ?>"
                     style="color: #2c3e50; font-weight: 600;">
            <?= htmlspecialchars($student->group->name) ?>
        </a>
    <?php else: ?>
        — <span style="color: #95a5a6;">Группа не назначена</span>
    <?php endif; ?>
</div>

<?php
$gradesByDiscipline = [];
foreach ($student->grades as $grade) {
    $disciplineId = $grade->discipline_id;
    if (!isset($gradesByDiscipline[$disciplineId])) {
        $gradesByDiscipline[$disciplineId] = [
            'discipline' => $grade->discipline,
            'grades' => []
        ];
    }
    $gradesByDiscipline[$disciplineId]['grades'][] = $grade;
}
?>

<?php if (count($gradesByDiscipline) > 0): ?>
    <table>
        <thead>
        <tr>
            <th>Дисциплина</th>
            <th>Оценки</th>
            <th>Средний балл</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($gradesByDiscipline as $item): ?>
            <?php
            $grades = $item['grades'];
            $total = 0;
            foreach ($grades as $g) {
                $total += $g->grade;
            }
            $avgGrade = count($grades) > 0 ? round($total / count($grades), 2) : 0;
            ?>
            <tr>
                <td>
                    <a href="<?= app()->route->getUrl('/discipline-detail') ?>?id=<?= $item['discipline']->id ?>"
                       style="color: #2c3e50; text-decoration: none; font-weight: 600;">
                        <?= htmlspecialchars($item['discipline']->name) ?>
                    </a>
                </td>
                <td>
                    <?php foreach ($grades as $g): ?>
                        <span style="font-weight: bold; color: <?= $g->grade >= 4 ? '#27ae60' : ($g->grade == 3 ? '#f39c12' : '#e74c3c') ?>; margin-right: 8px;">
                            <?= $g->grade ?>
                        </span>
                    <?php endforeach; ?>
                </td>
                <td style="font-weight: bold; color: <?= $avgGrade >= 4 ? '#27ae60' : ($avgGrade >= 3 ? '#f39c12' : '#e74c3c') ?>;">
                    <?= $avgGrade ?>
                </td>
                <td>
                    <?php foreach ($grades as $g): ?>
                        <a href="<?= app()->route->getUrl('/edit-grade') ?>?id=<?= $g->id ?>"
                           style="color: #2980b9; margin-right: 5px; font-size: 12px;">
                            [Изм]
                        </a>
                        <a href="<?= app()->route->getUrl('/delete-grade') ?>?id=<?= $g->id ?>"
                           onclick="return confirm('Вы точно хотите удалить эту оценку?')"
                           style="color: #e74c3c; margin-right: 8px; font-size: 12px;">
                            [Х]
                        </a>
                    <?php endforeach; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p style="color: #7f8c8d;">У студента пока нет оценок.</p>
<?php endif; ?>

<br>
<a href="<?= app()->route->getUrl('/add-grade') ?>?student_id=<?= $student->id ?>">+ Добавить оценку</a>
<br><br>
<a href="<?= app()->route->getUrl('/students') ?>">← Назад к списку студентов</a>