<?php
include 'header.html';
?>
<?php
    if (isset($_GET['N'])) {$name =$_GET['N'];} else {$name='';}
    if (isset($_GET['E'])) {$email =$_GET['E'];} else {$email='';}
    if (isset($_GET['S'])) {$source =$_GET['S'];} else {$source='';}
    
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display&family=Rampart+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display&family=Rampart+One&family=Rubik+Mono+One&display=swap" rel="stylesheet">
</head>

<body>

    <main>
        <div class="form"> 
            <h1>Обратная связь</h1>
            <div class="container">
                <form action="home.php" method="post">
                    <p><b>ФИО</b><br>
                        <input type="text" name="name" maxlength="25" size="40" placeholder="ФИО" value="<?=$name ?>">
                    </p>

                    <p><b>Email</b><br>
                        <input type="text" name="email" maxlength="25" size="40" placeholder="email" value="<?=$email ?>">
                    </p>

                    <p><b>Текст сообщения</b></p>
                    <p><textarea rows="10" cols="45" name="message"></textarea></p>
                 
                    <select name="category" size="1">
                        <option disabled>Выберите тип</option>
                        <option selected value="1">Обращение</option>
                        <option selected value="2">Жалоба</option>
                    </select>

                    <p><input type="file" name="attachment">

                    <p><label>Как вы узнали о нас?</label></p>
                    <div class="radio-group">
                    <input type="radio" id="internet" name="source" value="Реклама из интернета" required <?php if ($source == 'Реклама из интернета') echo ' checked="checked"'; ?>>
                    <label for="internet">Реклама из интернета</label>

                    <input type="radio" id="friends" name="source" value="Рассказали друзья" required <?php if ($source == 'Рассказали друзья') echo ' checked="checked"'; ?>>
                    <label for="friends">Рассказали друзья</label>
                    </div><br>


                    <input type="checkbox"><b>Даю согласие на обработку персональных данных</b><br>
                    <input class="btn" type="submit" value="Отправить">
                </form>
            </div>
        </div>
    </main>
   
</body>
</html>
