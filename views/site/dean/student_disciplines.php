<h2>Дисциплины студента</h2>

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

<?php if ($student->disciplines->count() > 0): ?>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Название дисциплины</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($student->disciplines as $discipline): ?>
            <tr>
                <td><?= $discipline->id ?></td>
                <td>
                    <a href="<?= app()->route->getUrl('/discipline-detail') ?>?id=<?= $discipline->id ?>"
                       style="color: #2c3e50; text-decoration: none; font-weight: 600;">
                        <?= htmlspecialchars($discipline->name) ?>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p style="color: #7f8c8d;">У данного студента пока нет дисциплин. Назначьте группу с учебным планом.</p>
<?php endif; ?>

<br>
<a href="<?= app()->route->getUrl('/students') ?>">← Назад к списку студентов</a>
