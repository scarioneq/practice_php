<h2><?= $message ?? 'Добро пожаловать' ?></h2>

<?php if (app()->auth::check()): ?>
    <section style="margin-top: 20px;">
        <h3>Панель управления деканата</h3>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">

            <!-- Студенты -->
            <div style="border: 1px solid #ccc; padding: 10px;">
                <h4>Студенты</h4>
                <a href="<?= app()->route->getUrl('/add-student') ?>">[+] Добавить студента</a><br>
                <a href="<?= app()->route->getUrl('/delete-student') ?>" style="color: red;">[-] Удалить студента</a>
            </div>

            <!-- Группы -->
            <div style="border: 1px solid #ccc; padding: 10px;">
                <h4>Группы</h4>
                <a href="<?= app()->route->getUrl('/add-group') ?>">[+] Добавить группу</a><br>
                <a href="<?= app()->route->getUrl('/delete-group') ?>" style="color: red;">[-] Удалить группу</a>
            </div>

            <!-- Дисциплины -->
            <div style="border: 1px solid #ccc; padding: 10px;">
                <h4>Дисциплины</h4>
                <a href="<?= app()->route->getUrl('/add-discipline') ?>">[+] Добавить дисциплину</a><br>
                <a href="<?= app()->route->getUrl('/delete-discipline') ?>" style="color: red;">[-] Удалить дисциплину</a>
            </div>

            <!-- Связи -->
            <div style="border: 1px solid #ccc; padding: 10px;">
                <h4>Учебный план</h4>
                <a href="<?= app()->route->getUrl('/connect-group-discipline') ?>">🔗 Связать группу и дисциплину</a>
            </div>

        </div>
    </section>
<?php else: ?>
    <p>Пожалуйста, авторизуйтесь для доступа к функциям.</p>
<?php endif; ?>
