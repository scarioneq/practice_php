<h2 style="margin-bottom: 20px;">Добавление оценки</h2>

<div style="margin-bottom: 20px; padding: 12px 16px; background: #ecf0f1; border-radius: 6px;">
    <strong>Студент:</strong> <?= htmlspecialchars($student->last_name . ' ' . $student->first_name . ' ' . $student->patronymic) ?>
</div>

<form method="POST" style="max-width: 600px; display: flex; flex-direction: column; gap: 15px;">

    <input type="hidden" name="student_id" value="<?= $student->id ?>">

    <fieldset>
        <legend>Оценка</legend>

        <label>Дисциплина: <br>
            <select name="discipline_id" required style="width: 100%;">
                <option value="">-- Выберите дисциплину --</option>
                <?php foreach ($disciplines as $discipline): ?>
                    <option value="<?= $discipline->id ?>"><?= $discipline->name ?></option>
                <?php endforeach; ?>
            </select>
        </label><br>

        <label>Оценка (2-5): <br>
            <select name="grade" required style="width: 100%;">
                <option value="">-- Выберите оценку --</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </label>
    </fieldset>

    <div style="margin-top: 10px;">
        <button type="submit">Сохранить оценку</button>
        <a href="<?= app()->route->getUrl('/student-grades') ?>?id=<?= $student->id ?>" style="margin-left: 10px;">Отмена</a>
    </div>
</form>