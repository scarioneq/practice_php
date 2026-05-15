<h2>Средняя успеваемость по дисциплинам</h2>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Название дисциплины</th>
        <th>Кол-во оценок</th>
        <th>Средняя оценка</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($disciplines as $discipline): ?>
        <?php
        $avgGrade = $discipline->grades->count() > 0 ? round($discipline->grades->avg('grade'), 2) : '—';
        ?>
        <tr>
            <td><?= $discipline->id ?></td>
            <td>
                <a href="<?= app()->route->getUrl('/discipline-detail') ?>?id=<?= $discipline->id ?>"
                   style="color: #2c3e50; text-decoration: none; font-weight: 600;">
                    <?= htmlspecialchars($discipline->name) ?>
                </a>
            </td>
            <td><?= $discipline->grades->count() ?></td>
            <td style="font-weight: bold; color: <?= is_numeric($avgGrade) ? ( $avgGrade >= 4 ? '#27ae60' : ($avgGrade >= 3 ? '#f39c12' : '#e74c3c')) : '#95a5a6' ?>;">
                <?= $avgGrade ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<br>
<a href="<?= app()->route->getUrl('/') ?>">← Назад на главную</a>