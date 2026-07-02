<h2 style="margin-bottom: 20px;">Добавление нового студента</h2>

<form method="POST" style="max-width: 600px; display: flex; flex-direction: column; gap: 15px;">

    <fieldset>
        <legend>Личные данные</legend>

        <label>Фамилия: <br>
            <input type="text" name="last_name" required style="width: 100%;">
        </label><br>

        <label>Имя: <br>
            <input type="text" name="first_name" required style="width: 100%;">
        </label><br>

        <label>Отчество: <br>
            <input type="text" name="middle_name" style="width: 100%;">
        </label><br>

        <div style="display: flex; gap: 20px;">
            <label>Пол: <br>
                <select name="gender" required>
                    <option value="male">Мужской</option>
                    <option value="female">Женский</option>
                </select>
            </label>

            <label>Дата рождения: <br>
                <input type="date" name="birth_date" required>
            </label>
        </div>
    </fieldset>

    <fieldset>
        <legend>Обучение</legend>
        <label>Группа: <br>
            <select name="group_of_students_id" required style="width: 100%;">
                <option value="">-- Выберите группу --</option>
                <?php foreach ($groups as $group): ?>
                    <option value="<?= $group->id ?>"><?= $group->name ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    </fieldset>

    <fieldset>
        <legend>Адрес регистрации</legend>

        <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 10px;">
            <label>Почтовый индекс: <br>
                <input type="text" name="index" required style="width: 100%;">
            </label>
            <label>Регион: <br>
                <input type="text" name="region" required style="width: 100%;" placeholder="Томская обл.">
            </label>
        </div>

        <label>Город: <br>
            <input type="text" name="city" required style="width: 100%;">
        </label><br>

        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 10px; margin-top: 10px;">
            <label>Улица: <br>
                <input type="text" name="street" required style="width: 100%;">
            </label>
            <label>Квартира: <br>
                <input type="text" name="flat" style="width: 100%;">
            </label>
        </div>
    </fieldset>

    <div style="margin-top: 10px;">
        <button type="submit">Сохранить студента</button>
        <a href="<?= app()->route->getUrl('/students') ?>" style="margin-left: 10px;">Отмена</a>
    </div>
</form>
