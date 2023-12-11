<?php
$text = $_POST['text'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Лабораторная работа №10</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display&display=swap" rel="stylesheet">
    
</head>

<body>
    <header>
        <h1>Анализ текста</h1>
    </header>
    <main>
    <?php
        if (isset($_POST['text']) && $_POST['text']) {     
            echo '<b>Исходный текст:</b>';   
            echo '<table class="table">';
            echo '<div class="src_text">' . nl2br($_POST['text']) . '</div>';
            echo '<table class="table">';
            test_it(iconv("utf-8", "cp1251", $_POST['text']));
           
            $arr_symbs = test_symbs(iconv("utf-8", "cp1251", $_POST['text']));
            echo '<table class="table">';
            echo '<b>Символы:</b>';  
            foreach ($arr_symbs as $key => $value) {
                echo '<tr><td>' . iconv("cp1251", "utf-8", $key) . '</td><td>' . $value . '</td></tr>';
            }
            echo "</table><br>";
        } else {
            echo '<div class="src_error">Нет текста для анализа</div>';
        }  
        
        
    

        function test_it( $text )
        {
            echo '<b>Информация о тексте:</b>';  
            
            // количество символов в тексте определяется функцией размера текста
            
            // определяем ассоциированный массив с цифрами
            $cifra=array( '0'=>true, '1'=>true, '2'=>true, '3'=>true, '4'=>true,
                        '5'=>true, '6'=>true, '7'=>true, '8'=>true, '9'=>true );
            $punctuation=array( ','=>true, '.'=>true, '-'=>true, '!'=>true, '?'=>true, "'"=>true);
            // вводим переменные для хранения информации о:
            $cifra_amount=0; // количество цифр в тексте
            $punctuation_count = 0;  // колво знаков пунктуации в тексте
            $word_amount=0; // количество слов в тексте
            $letter_count = 0;  // колво букв в тексте
            $upperCase_count = 0;  // колво букв в верхнем регистре
            $lowerCase_count = 0;  // колво букв в нижнем регистре
            $word=''; // текущее слово
            $words=array(); // список всех слов

            for($i=0; $i<strlen($text); $i++) 
            {
                // если встретилась цифра
                if( array_key_exists($text[$i], $cifra) ) 
                    $cifra_amount++; 

                // если знак пунктуации
                else if (array_key_exists($text[$i], $punctuation) )  
                    $punctuation_count++;

                //если не пробел увеличиваем счетчик букв
                else if ($text[$i] != ' ' && $text[$i]!=',' && $text[$i]!='.' && $text[$i]!='!' && $text[$i]!='?') {
                    $letter_count++;
                    if (iconv("cp1251", "utf-8", $text[$i]) == mb_strtolower(iconv("cp1251", "utf-8", $text[$i]))){
                        $lowerCase_count++;
                    }   
                    else {
                        $upperCase_count++;
                    }                        
                }     
                // если в тексте встретился пробел, знаки препинания или текст закончился
                if( $text[$i]==' ' || $text[$i]==',' || $text[$i]=='.' || $text[$i]=='!' || $text[$i]=='?' || $i==strlen($text)-1 ) { 
                        
                    if ($text[$i]!=' ' && $text[$i]!=',' && $text[$i]!='.' && $text[$i]!='!' && $text[$i]!='?')
                        $word.=$text[$i];

                    if( $word ) {
                        if( isset($words[$word]) ) 
                            $words[ $word ]++; 
                        else
                            $words[ $word ]=1; 
                    }

                    $word=''; 
                }
                else // если слово продолжается
                    $word.=$text[$i]; //добавляем в текущее слово новый символ
            }

            echo '<tr><td>Количество цифр: </td><td>'.$cifra_amount.'</td></tr>';
            echo '<tr><td>Количество знаков препинания: </td><td>'.$punctuation_count.'</td></tr>';
            echo '<tr><td>Количество букв: </td><td>'.$letter_count.'</td></tr>';
            echo '<tr><td>Количество заглавных букв: </td><td>'.$upperCase_count.'</td></tr>';
            echo '<tr><td>Количество строчных букв: </td><td>'.$lowerCase_count.'</td></tr>';    
            echo '<tr><td>Количество слов: </td><td>'.count($words).'</td></tr></table><br>';

            echo '</table>';

            ksort($words);
            echo '<b>Слова:</b>'; 

            echo '<table class="table_view">';
            foreach ($words as $key => $value) { 
                echo '<tr><td>' . iconv("cp1251", "utf-8", $key) . '</td><td>' . $value . '</td></tr>';
            }
            echo '</table><br>';


            function test_symbs( $text ) {
                $symbs=array();
            
                $l_text = mb_strtolower(iconv("cp1251", "utf-8", $text));
            
                $l_text = iconv("utf-8", "cp1251", $l_text); 
            
                for($i=0; $i<strlen($l_text); $i++) {
                    if( isset($symbs[$l_text[$i]]) )
                        $symbs[$l_text[$i]]++;
                    else
                        $symbs[$l_text[$i]]=1;
                }
                return $symbs;
            }
        }    
    ?> 
    <a href="index.html">Другой анализ</a>   
    </main>
    <footer>
        <p>ilffeza@gmail.com</p>
    </footer>
</body>
</html>
