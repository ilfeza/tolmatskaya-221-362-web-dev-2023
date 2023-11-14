<?php
date_default_timezone_set('Europe/Moscow');
$title = 'Толмацкая Ирина, 221-362, лабораторная работа № 3';
$currentDate = date('d.m.Y в H:i:s');
$array = array('Африканский белопузый ёж',
'Обыкновенный ёж',
'Американский белобрюхий ёж',
'Индийский ёж',
'Белоспинный ёж',)
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
                $current_page = true;
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
                $current_page = false;
                echo $link; ?>" 
                <?php if ($current_page) echo ' class="decoration"'; ?>
                ><?php echo $name; ?></a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="title">
            <p>ЁЖИКИ</p>
        </div>
        <div class="cute">
            <?php echo '<img src="foto'.(date('s') % 2+1).'.jpg" alt="Меняющаяся фотография">'; ?>
        </div>   
        <div class="row">
            <p>Ежики - это удивительные маленькие создания, которые внушают нам чувство уюта и тепла. Своими небольшими
                шипами и симпатичными мордочками они завоевали сердца людей по всему миру.

                Ежики принадлежат к семейству настоящих игуан и являются ночными животными. Они обладают острым
                обонянием и слухом, что помогает им охотиться на свою еду - насекомых и ягоды. Хотя они могут выглядеть
                осторожными, они часто проявляют интерес к окружающему миру и даже могут подпускать людей близко.

                Одной из удивительных черт ежей является их способность спать зимой. Они проводят зимний сон, чтобы
                сэкономить энергию и выждать холодные месяцы. Когда приходит весна, они просыпаются и начинают активную
                жизнь.</p>
            <table>
                <tr>
                    <th>Факт</th>
                    <th>Описание</th>
                </tr>
                <tr>
                    <td>Виды ежей</td>
                    <td>Европейский еж, африканский белобрюхий еж, и др.</td>
                </tr>
                <tr>
                    <td>Питание</td>
                    <td>Животноворительный рацион с ягодами и насекомыми</td>
                </tr>
                <tr>
                    <td>Спящий режим</td>
                    <td>Зимний сон с пробуждением для питания</td>
                </tr>
                <tr>
                    <td>Среда обитания</td>
                    <td>Леса, сады и пригородные территории</td>
                </tr>
            </table>
        </div>
        <h2>Самые популярные виды ёжиков:</h2>
        <ul>
            <?php foreach ($array as $element): ?>
                <li><?= $element; ?></li>
            <?php endforeach; ?>
        </ul>
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