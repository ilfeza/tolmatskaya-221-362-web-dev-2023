<?php
date_default_timezone_set('Europe/Moscow');
$title = 'Толмацкая Ирина, 221-362, лабораторная работа № 3';
$currentDate = date('d.m.Y в H:i:s');
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display&family=Rampart+One&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display&family=Rampart+One&family=Rubik+Mono+One&display=swap"
        rel="stylesheet">
</head>

<body>
<header class="header">
        <nav>
            <ul class="menu">
            <li><a href="<?php
                $name = 'Главная';
                $link = 'index.php';
                $current_page = false;
                echo $link; ?>" 
                <?php if ($current_page) echo ' class="decoration"'; ?>
                ><?php echo $name; ?></a></li>

                <li><a href="<?php
                $name = 'Обратная связь';
                $link = 'feedback.php';
                $current_page = false;
                echo $link; ?>" 
                <?php if ($current_page) echo ' class="decoration"'; ?>
                ><?php echo $name; ?></a></li>

                <li><a href="<?php
                $name = 'Авторизация';
                $link = 'login.php';
                $current_page = true;
                echo $link; ?>" 
                <?php if ($current_page) echo ' class="decoration"'; ?>
                ><?php echo $name; ?></a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="form">
            <h1>Авторизация</h1>
            <div class="container">
                <form action="https://httpbin.org/post" method="post" enctype="multipart/form-data">
                    <p><b>Логин:</b><br>
                        <input type="text" maxlength="25" size="40" name="login" placeholder="Логин">
                    </p>
                    <p><b>Пароль:</b><br>
                        <input type="password" maxlength="25" size="40" name="password" placeholder="Пароль">
                    </p>
                    <input type="checkbox"><b>Запомнить меня</b><br>
                    <input class="btn" type="submit" value="Войти">
                </form>
            </div>
        </div>
    </main>
    <footer>
        <div class="footer">
            <?php echo 'Сформировано ' . $currentDate; ?>
            <p>Толмацкая Ирина</p>
            <p>ilffeza@gmail.com</p>
        </div>
    </footer>
</body>
</html>