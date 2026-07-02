<h2>Авторизация</h2>

<?php if (isset($message)): ?>
    <p style="color: #e74c3c; font-weight: bold;"><?= $message ?></p>
<?php endif; ?>

<h3><?= app()->auth->user()->name ?? ''; ?></h3>
<?php
if (!app()->auth::check()):
    ?>
    <form method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

        <label>Логин: <br>
            <input type="text" name="login" required style="width: 100%;">
        </label>

        <label>Пароль: <br>
            <input type="password" name="password" required style="width: 100%;">
        </label>

        <button type="submit">Войти</button>
    </form>
<?php endif; ?>
