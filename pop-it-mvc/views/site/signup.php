<h2>Регистрация нового пользователя</h2>

<?php if (isset($message)): ?>
    <p style="color: #e74c3c; font-weight: bold;"><?= $message ?></p>
<?php endif; ?>

<form method="post" style="max-width: 400px; display: flex; flex-direction: column; gap: 15px;">
    <label>Имя: <br>
        <input type="text" name="name" required style="width: 100%;">
    </label>

    <label>Логин: <br>
        <input type="text" name="login" required style="width: 100%;">
    </label>

    <label>Пароль: <br>
        <input type="password" name="password" required style="width: 100%;">
    </label>

    <button type="submit">Зарегистрироваться</button>
</form>
