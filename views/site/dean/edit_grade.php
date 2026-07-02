<h2 style="margin-bottom: 20px;">Редактирование оценки</h2>

<div style="margin-bottom: 20px; padding: 12px 16px; background: #ecf0f1; border-radius: 6px;">
    <strong>Студент:</strong> <?= htmlspecialchars($grade->student->last_name . ' ' . $grade->student->first_name . ' ' . $grade->student->patronymic) ?>
</div>

<form method="POST" style="max-width: 600px; display: flex; flex-direction: column; gap: 15px;">

    <fieldset>
        <legend>Оценка</legend>

        <label>Дисциплина: <br>
            <select name="discipline_id" required style="width: 100%;">
                <?php foreach ($disciplines as $discipline): ?>
                    <option value="<?= $discipline->id ?>" <?= $discipline->id == $grade->discipline_id ? 'selected' : '' ?>>
                        <?= $discipline->name ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label><br>

        <label>Оценка (2-5): <br>
            <select name="grade" required style="width: 100%;">
                <option value="">-- Выберите оценку --</option>
                <option value="2" <?= $grade->grade == 2 ? 'selected' : '' ?>>2</option>
                <option value="3" <?= $grade->grade == 3 ? 'selected' : '' ?>>3</option>
                <option value="4" <?= $grade->grade == 4 ? 'selected' : '' ?>>4</option>
                <option value="5" <?= $grade->grade == 5 ? 'selected' : '' ?>>5</option>
            </select>
        </label>
    </fieldset>

    <div style="margin-top: 10px;">
        <button type="submit">Сохранить оценку</button>
        <a href="<?= app()->route->getUrl('/student-grades') ?>?id=<?= $grade->student_id ?>" style="margin-left: 10px;">Отмена</a>
    </div>
</form>