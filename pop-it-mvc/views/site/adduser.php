<h2>Регистрация сотрудника (Админ-панель)</h2>

<?php if (isset($message)): ?>
    <p style="color: green; font-weight: bold;"><?= $message ?></p>
<?php endif; ?>

<form method="POST">
    <div style="margin-bottom: 10px;">
        <label>ФИО сотрудника:</label><br>
        <input type="text" name="name" required>
    </div>

    <div style="margin-bottom: 10px;">
        <label>Логин:</label><br>
        <input type="text" name="login" required>
    </div>

    <div style="margin-bottom: 10px;">
        <label>Пароль:</label><br>
        <input type="password" name="password" required>
    </div>

    <button type="submit">Зарегистрировать</button>
</form>