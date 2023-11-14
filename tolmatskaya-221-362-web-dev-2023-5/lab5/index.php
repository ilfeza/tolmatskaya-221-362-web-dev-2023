<?php
    include "db.php";
    $result = mysqli_query($mysql, "SELECT * FROM `images`");

    $result_terms = mysqli_query($mysql, "SELECT * FROM `terms`");
?>


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
        
        
        <div class="box">
            <?php 
                while($name = mysqli_fetch_assoc($result)){
                ?>
                    <div class="filters__img">
                        <img  title="<?php echo $name['name'];?>" src="images/<?php echo $name['img'];?>"  title="$name['name']"/>
                        </div>
                    <?php
                }
            ?>
        </div> 


  
        <table>
            <tr>
                <th>Название</th>
                <th>Определение</th>
            </tr>
            <?php
                while ($row = $result_terms->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["definition"] . "</td>";
                    echo "</tr>";
                }
            ?>
        </table>


        
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