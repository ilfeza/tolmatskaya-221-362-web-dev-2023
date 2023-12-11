<?php	
	include 'header.html';
?>

<body>
    <div class = "answer">
        <?php 
            if(isset($_GET['name'])){
                $name=$_GET['name'];
                $email=$_GET['email'];
                $message=$_GET['text'];
                $category=$_GET['category'];
                $source=$_GET['source'];
            }
    

            echo '<p> Здравствуйте, '.$_POST['name'].'</p>'; //выводим ФИО
            if ($_POST['category'] == 'propose'){ //проверяем тип обращения
                echo '<p>Спасибо за ваше предложение:</p>';
                echo '<textarea>'.$_POST['message'].'</textarea>';//вывод текста сообщения
            }else{
                echo '<p>Мы рассмотрим Вашу жалобу:</p>';
                echo '<textarea>'.$_POST['message'].'</textarea>';
            }

            if (isset($_POST['attachment']) & $_POST['attachment'] != '') echo 'Вы приложили следующий файл: '.$_POST['attachment'];
            echo '<a class="btn" href="index.php?N='.$_POST['name'].'&E='.$_POST['email'].'&S='.$_POST['source'].'">Заполнить снова</a>';
        ?>

    </div>
    
</body>

