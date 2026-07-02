<h2 style="margin-bottom: 20px;">Редактирование студента</h2>

<form method="POST" style="max-width: 600px; display: flex; flex-direction: column; gap: 15px;">

    <fieldset>
        <legend>Личные данные</legend>

        <label>Фамилия: <br>
            <input type="text" name="last_name" required value="<?= htmlspecialchars($student->last_name) ?>" style="width: 100%;">
        </label><br>

        <label>Имя: <br>
            <input type="text" name="first_name" required value="<?= htmlspecialchars($student->first_name) ?>" style="width: 100%;">
        </label><br>

        <label>Отчество: <br>
            <input type="text" name="patronymic" value="<?= htmlspecialchars($student->patronymic ?? '') ?>" style="width: 100%;">
        </label><br>

        <div style="display: flex; gap: 20px;">
            <label>Пол: <br>
                <select name="gender" required>
                    <option value="male" <?= $student->gender === 'male' ? 'selected' : '' ?>>Мужской</option>
                    <option value="female" <?= $student->gender === 'female' ? 'selected' : '' ?>>Женский</option>
                </select>
            </label>

            <label>Дата рождения: <br>
                <input type="date" name="date_of_birth" required value="<?= $student->date_of_birth ?>">
            </label>
        </div>
    </fieldset>

    <fieldset>
        <legend>Обучение</legend>
        <label>Группа: <br>
            <select name="group_of_students_id" required style="width: 100%;">
                <option value="">-- Выберите группу --</option>
                <?php foreach ($groups as $group): ?>
                    <option value="<?= $group->id ?>" <?= $group->id === $student->group_of_students_id ? 'selected' : '' ?>>
                        <?= $group->name ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>
    </fieldset>

    <fieldset>
        <legend>Адрес регистрации</legend>

        <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 10px;">
            <label>Почтовый индекс: <br>
                <input type="text" name="index" required value="<?= htmlspecialchars($student->address->index ?? '') ?>" style="width: 100%;">
            </label>
            <label>Регион: <br>
                <input type="text" name="region" required value="<?= htmlspecialchars($student->address->region ?? '') ?>" style="width: 100%;">
            </label>
        </div>

        <label>Город: <br>
            <input type="text" name="city" required value="<?= htmlspecialchars($student->address->city ?? '') ?>" style="width: 100%;">
        </label><br>

        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 10px; margin-top: 10px;">
            <label>Улица: <br>
                <input type="text" name="street" required value="<?= htmlspecialchars($student->address->street ?? '') ?>" style="width: 100%;">
            </label>
            <label>Квартира: <br>
                <input type="text" name="flat" value="<?= htmlspecialchars($student->address->flat ?? '') ?>" style="width: 100%;">
            </label>
        </div>
    </fieldset>

    <div style="margin-top: 10px;">
        <button type="submit">Сохранить изменения</button>
        <a href="<?= app()->route->getUrl('/students') ?>" style="margin-left: 10px;">Отмена</a>
    </div>
</form>
