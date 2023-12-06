<?php
date_default_timezone_set("Europe/Moscow");
$today = date('d.m.Y Время: H-i:s');  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Лабораторная работа №11</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display&display=swap" rel="stylesheet">
    
</head>

<body>
    <header>
        <nav class="main-menu">
            <?php
                echo '<a href="?html_type=TABLE';
                if( isset($_GET['content']) )
                    echo '&content='.$_GET['content'];
                echo '"';
                if( array_key_exists('html_type', $_GET) && $_GET['html_type']== 'TABLE' )
                    echo ' class="selected"';
                echo '>Табличная верстка</a>';

                echo '<a href="?html_type=DIV';
                if( isset($_GET['content']) )
                    echo '&content='.$_GET['content'];
                echo '"';
                if( array_key_exists('html_type', $_GET) && $_GET['html_type']== 'DIV' )
                    echo ' class="selected"';
                 echo '>Блочная верстка</a>';
            ?>
        </nav>
    </header>
    <main>
        <div id="product_menu">
            <?php
                echo '<a href="?content=n/a';
                if (isset($_GET['html_type']))
                    echo '&html_type=' . $_GET['html_type'];
                echo '"';
                if (!isset($_GET['content']) || $_GET['content'] == "n/a")
                    echo ' class="selected"';
                echo '>Вся таблица умножения</a>';

                for ($i = 2; $i <= 9; $i++) {
                    echo '<a href="?content=' . $i . '';
                    if (isset($_GET['html_type']))
                        echo '&html_type=' . $_GET['html_type'];
                    echo '"';
                    if (isset($_GET['content']) && $_GET['content'] == $i)
                        echo ' class="selected"';
                    echo '>Таблица умножения на ' . $i . '</a>';
                }
            ?>
        </div>
        <section class="exmple">
            <?php
                if (!isset($_GET['html_type']) || $_GET['html_type']== 'TABLE' )
                    outTableForm();
                else
                    outDivForm();
            ?>
        </section>
    </main>
    <footer>
    <div class="footer-wrap">
        <div>
            <ul class="footer-info">
                <li class="footer-info_item" style="color: black"><?=getHTMLType()?></li>
                <li class="footer-info_item" style="color: black"><?=getContent()?></li>
            </ul>
        </div>
        <div style="text-align:left">Сформировано <?= $today ?></div>
    </div>
    </footer>
</body>
</html>

<?php
    // функция ВЫВОДИТ ТАБЛИЦУ УМНОЖЕНИЯ В ТАБЛИЧНОЙ ФОРМЕ
    function outTableForm()
    {
        if (!isset($_GET['content']) || $_GET['content'] == 'n/a') 
        {
            for ($i = 2; $i < 10; $i++) 
            {
                echo '<table class="tvRow">';
                outRowTable($i);
                echo '</table>';
            }
        } 
        else 
        {
            echo '<table class="tvSingleRow">';
            outRowTable($_GET['content']);
            echo '</table>';
        }
    }
    // функция ВЫВОДИТ ТАБЛИЦУ УМНОЖЕНИЯ В БЛОЧНОЙ ФОРМЕ
    function outDivForm () {
        if( !isset($_GET['content']) || $_GET['content']=="n/a") {
            for($i=2; $i<10; $i++) {
                echo '<div class="bvRow">';
                outRow( $i );
                echo '</div>';
            }
        }
        else {
            echo '<div class="bvSingleRow">';
            outRow( $_GET['content'] );
            echo '</div>';
        }
    } 

    //функция ВЫВОДИТ СТОЛБЕЦ ТАБЛИЦЫ УМНОЖЕНИЯ 
    function outRow($n){
        for($i=2; $i<=9; $i++) {
            echo outNumAsLink($n);
            echo 'x';
            echo outNumAsLink($i);
            echo '=';
            echo outNumAsLink($i*$n).'<br>';
        }    

    }

    //функция ВЫВОДИТ СТОЛБЕЦ ТАБЛИЦЫ УМНОЖЕНИЯ ДЛЯ TABLE
    function outRowTable($n)
    {
        for ($i = 2; $i <= 9; $i++) 
        {
            echo '<tr><td>';
            echo outNumAsLink($n);
            echo 'x';
            echo outNumAsLink($i);
            echo '</td><td>';
            echo outNumAsLink($i * $n);
            echo '</td></tr>';
        }
    }

    //преобразует число в соответствующую ему ссылку (если это возможно) и возвращает ее
    function outNumAsLink($x)
    {
        if ($x <= 9) {
            echo '<a href="?content=' . $x . '&html_type=';
            if (!isset($_GET['html_type']))
                echo 'TABLE"';
            else
                echo $_GET['html_type'] . '"';
            echo '>' . $x . '</a>';
        } else
            echo $x;
    }

    function getHTMLType()
    {
        if (!isset($_GET['html_type']))
            return 'Верстка не выбрана';
        else if ($_GET['html_type'] == "TABLE")
            return 'Табличная верстка';
        else
            return 'Блочная верстка';
    }

    function getContent()
    {
        if (!isset($_GET['content']) || $_GET['content'] == 'n/a')
            return 'Вся таблица умножения';
        else
            return 'Таблица умножения на ' . $_GET['content'];
    }
?>