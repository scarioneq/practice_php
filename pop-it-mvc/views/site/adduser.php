<h2>Регистрация сотрудника (Админ-панель)</h2>

<?php if (isset($message)): ?>
    <p style="color: #27ae60; font-weight: bold;"><?= $message ?></p>
<?php endif; ?>

<form method="POST" style="max-width: 400px; display: flex; flex-direction: column; gap: 15px;">
    <label>ФИО сотрудника: <br>
        <input type="text" name="name" required style="width: 100%;">
    </label>

    <label>Логин: <br>
        <input type="text" name="login" required style="width: 100%;">
    </label>

    <label>Пароль: <br>
        <input type="password" name="password" required style="width: 100%;">
    </label>

    <button type="submit">Зарегистрировать</button>
</form>
