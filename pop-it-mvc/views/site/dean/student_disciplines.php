<h2>Дисциплины студента</h2>

<div style="margin-bottom: 20px; padding: 10px; background: #f9f9f9; border: 1px solid #ccc;">
    <strong><?= htmlspecialchars($student->last_name . ' ' . $student->first_name . ' ' . $student->patronymic) ?></strong>
    <?php if ($student->group): ?>
        — Группа: <a href="<?= app()->route->getUrl('/group-detail') ?>?id=<?= $student->group->id ?>"
                     style="color: navy; text-decoration: none;">
            <?= htmlspecialchars($student->group->name) ?>
        </a>
    <?php else: ?>
        — <span style="color: gray;">Группа не назначена</span>
    <?php endif; ?>
</div>

<?php if ($student->disciplines->count() > 0): ?>
    <table border="1" style="width: 100%; border-collapse: collapse; text-align: left;">
        <thead>
        <tr style="background-color: #f2f2f2;">
            <th style="padding: 10px;">ID</th>
            <th style="padding: 10px;">Название дисциплины</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($student->disciplines as $discipline): ?>
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
    <p>У данного студента пока нет дисциплин. Назначьте группу с учебным планом.</p>
<?php endif; ?>

<br>
<a href="<?= app()->route->getUrl('/students') ?>">← Назад к списку студентов</a>
