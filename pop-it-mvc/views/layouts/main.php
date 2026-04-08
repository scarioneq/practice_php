<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pop it MVC</title>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            margin: 0; padding: 0;
            background: #f5f7fa;
            color: #333;
        }
        header {
            background: #2c3e50;
            padding: 12px 30px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        }
        header nav { display: flex; align-items: center; gap: 18px; }
        header nav a {
            color: #ecf0f1; text-decoration: none;
            font-size: 15px; padding: 6px 12px;
            border-radius: 4px; transition: background .2s;
        }
        header nav a:hover { background: rgba(255,255,255,0.1); }
        main {
            max-width: 1100px;
            margin: 30px auto;
            padding: 24px 28px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.08);
        }
        h2 { margin-top: 0; color: #2c3e50; }
        h3 { color: #34495e; }
        a { color: #2980b9; }
        a:hover { color: #3498db; }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 16px 0;
            font-size: 14px;
        }
        table th {
            background: #ecf0f1;
            padding: 10px 12px;
            text-align: left;
            font-weight: 600;
            color: #2c3e50;
        }
        table td {
            padding: 10px 12px;
            border-bottom: 1px solid #eee;
        }
        table tr:hover { background: #f8f9fa; }
        table a { font-weight: 500; }

        fieldset {
            padding: 16px;
            border: 1px solid #ddd;
            border-radius: 6px;
            background: #fafbfc;
        }
        legend {
            font-weight: 600;
            padding: 0 8px;
            color: #2c3e50;
        }
        input[type="text"], input[type="password"], input[type="date"],
        select {
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        input:focus, select:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 2px rgba(52,152,219,0.15);
        }
        button {
            padding: 9px 20px;
            background: #27ae60;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            transition: background .2s;
        }
        button:hover { background: #2ecc71; }
    </style>
</head>
<body>
<header>
    <nav>
        <a href="<?= app()->route->getUrl('/') ?>">Главная</a>
        <?php
        if (!app()->auth::check()):
            ?>
            <a href="<?= app()->route->getUrl('/login') ?>">Вход</a>
            <a href="<?= app()->route->getUrl('/signup') ?>">Регистрация</a>
        <?php
        else:
            if (app()->auth::user()->is_admin): ?>
                <a href="<?= app()->route->getUrl('/users') ?>">Сотрудники деканата</a>
            <?php endif; ?>

            <a href="<?= app()->route->getUrl('/logout') ?>">Выход (<?= app()->auth::user()->name ?>)</a>
        <?php
        endif;
        ?>
    </nav>
</header>
<main>
    <?= $content ?? '' ?>
</main>

</body>
</html>
