<h2 style="margin-bottom: 20px;">Редактирование группы</h2>

<form method="POST" style="max-width: 400px; display: flex; flex-direction: column; gap: 15px;">
    <label>Название группы: <br>
        <input type="text" name="name" required value="<?= htmlspecialchars($group->name) ?>" style="width: 100%;">
    </label>

    <div style="margin-top: 10px;">
        <button type="submit" style="padding: 10px 20px; background: #28a745; color: white; border: none; cursor: pointer;">
            Сохранить изменения
        </button>
        <a href="<?= app()->route->getUrl('/groups') ?>" style="margin-left: 10px;">Отмена</a>
    </div>
</form>
