<h2 style="margin-bottom: 20px;">Добавление дисциплины</h2>

<form method="POST" style="max-width: 400px; display: flex; flex-direction: column; gap: 15px;">
    <label>Название дисциплины: <br>
        <input type="text" name="name" required style="width: 100%;" placeholder="Например: Математика">
    </label>

    <div style="margin-top: 10px;">
        <button type="submit">Создать дисциплину</button>
        <a href="<?= app()->route->getUrl('/disciplines') ?>" style="margin-left: 10px;">Отмена</a>
    </div>
</form>
