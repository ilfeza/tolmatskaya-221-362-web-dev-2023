<?php include "func.php"?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лабораторная работа №9, Вариант 9 - Толмацкая Ирина Алексеевна, Группа 221-362</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="polytech_logo_main_RGB.png" alt="Логотип университета">
        </div>
        <div class="header-info">
            <h1>Толмацкая Ирина Алексеевна, Группа: 221-362</h1>
        </div>
    </header>

    <main>


        <form method="post" action="">
            <br>
            <label class="label" for="startArgument">Начальный аргумент:</label>
            <input type="number" name="startArgument" id="startArgument" required value="<?php echo isset($_POST['startArgument']) ? htmlspecialchars($_POST['startArgument']) : ''; ?>">
            <br><br>
            <label for="numValues">Количество значений функции:</label>
            <input type="number" name="numValues" id="numValues" required value="<?php echo isset($_POST['numValues']) ? htmlspecialchars($_POST['numValues']) : ''; ?>">
            <br><br>
            <label for="step">Шаг:</label>
            <input type="number" name="step" id="step" required value="<?php echo isset($_POST['step']) ? htmlspecialchars($_POST['step']) : ''; ?>">
            <br><br>
            <label for="layoutType">Тип верстки:</label>
            <select name="layoutType" id="layoutType">
                <option value="A" <?php echo ($_POST['layoutType'] ?? '') === 'A' ? 'selected' : ''; ?>>Тип A</option>
                <option value="B" <?php echo ($_POST['layoutType'] ?? '') === 'B' ? 'selected' : ''; ?>>Тип B</option>
                <option value="C" <?php echo ($_POST['layoutType'] ?? '') === 'C' ? 'selected' : ''; ?>>Тип C</option>
                <option value="D" <?php echo ($_POST['layoutType'] ?? '') === 'D' ? 'selected' : ''; ?>>Тип D</option>
                <option value="E" <?php echo ($_POST['layoutType'] ?? '') === 'E' ? 'selected' : ''; ?>>Тип E</option>
            </select>
            <br><br>
            <button type="submit" class="btn">Рассчитать</button>
        </form>
        <?php
        $layoutType = isset($_POST["layoutType"]) ? $_POST["layoutType"] : ''; // По умолчанию пустая строка, если переменная не определена

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Получаем значения из формы и присваиваем их переменным
            $startArgument = (int) $_POST["startArgument"];
            $numValues = (int) $_POST["numValues"];
            $step = (int) $_POST["step"];
            $layoutType = $_POST["layoutType"];

            // Вывод типа верстки в подвале
            echo "<footer><p>Тип верстки: $layoutType</p></footer>";

            $values = [];

            // Вычисление значений функции и их вывод в соответствии с выбранным типом верстки
            function for_func($startArgument, $numValues, $step, $layoutType, $values){
                echo "<p>Цикл со счетчиком</p>";

                for($i = 0; $i < $numValues; $i++) {
                    $k = $i + 1;
                    $argument = $startArgument + ($i * $step);

                    if ($argument == 100) {
                        $value = 'Ошибка';
                    } else {
                        if ($argument <= 10) {
                            $value = round($argument*$argument*($argument-2)+4,3);
                        } elseif ($argument > 10 && $argument < 20) {
                            $value = round(11*$argument-55, 3);
                        } else {
                            $value = round(($argument-100)/(100-$argument)-$argument/10, 3);
                        }
                    }
                    $values[] = $value;


                    switch($layoutType){
                        case 'A':
                            echo "f($argument) = $value<br><br>";
                            break;
                        case 'B':
                            echo "<ul><li>f($argument) = $value</li></ul>";
                            break;
                        case 'C':
                            echo "<ol start='$k'><li>f($argument) = $value</li></ol>";
                            break;
                        case 'D':
                            echo "<div class='typeD'><table>
                            <tr>
                                <td>#</td>
                                <td>Аргумент функции</td>
                                <td>Значение функции</td>
                            </tr>
                            <tr>
                                <td>$i</td>
                                <td>$argument</td>
                                <td>$value</td>
                                </tr>
                            </table>
                            </div>";
                        break;
                        case 'E':
                                echo "<div class='typeE'>
                            <br>
                                f($argument) = $value
                            </div>";
                            break;
                    }

                    
                }
                


                // Вычисление и вывод максимального, минимального, среднего арифметического и суммы значений функции
                // Проверяем, что все значения массива $values являются числами
                // Проверка наличия значений и числовых данных в массиве
                if (!empty($values) && count(array_filter($values, 'is_numeric')) > 0) {
                    // Фильтрация числовых значений
                    $numericValues = array_filter($values, 'is_numeric');

                    $max = round(max($numericValues), 3);
                    $min = round(min($numericValues), 3);
                    $average = round(array_sum($numericValues) / count($numericValues), 3);
                    $sum = round(array_sum($numericValues), 3);

                    echo "<br>Максимальное значение: $max<br><br>";
                    echo "Минимальное значение: $min<br><br>";
                    echo "Среднее арифметическое: $average<br><br>";
                    echo "Сумма значений: $sum<br>";
                } else {
                    echo 'Невозможно рассчитать максимальное, минимальное, среднее арифметическое и сумму значений функции, так как введенные данные некорректны';
                }
            }

            function while_func($startArgument, $numValues, $step, $layoutType, $values){
                echo "<p>Цикл с условием</p>";
                $i = 0;

                while($i < $numValues) {
                    $k = $i + 1;
                    $argument = $startArgument + ($i * $step);

                    if ($argument == 100) {
                        $value = 'Ошибка';
                    } else {
                        if ($argument <= 10) {
                            $value = round($argument*$argument*($argument-2)+4,3);
                        } elseif ($argument > 10 && $argument < 20) {
                            $value = round(11*$argument-55, 3);
                        } else {
                            $value = round(($argument-100)/(100-$argument)-$argument/10, 3);
                        }
                    }
                    $values[] = $value;
            

                    
                    switch($layoutType){
                        case 'A':
                            echo "f($argument) = $value<br><br>";
                            break;
                        case 'B':
                            echo "<ul><li>f($argument) = $value</li></ul>";
                            break;
                        case 'C':
                            echo "<ol start='$k'><li>f($argument) = $value</li></ol>";
                            break;
                        case 'D':
                            echo "<div class='typeD'><table>
                            <tr>
                                <td>#</td>
                                <td>Аргумент функции</td>
                                <td>Значение функции</td>
                            </tr>
                            <tr>
                                <td>$i</td>
                                <td>$argument</td>
                                <td>$value</td>
                                </tr>
                            </table>
                            </div>";
                        break;
                        case 'E':
                                echo "<div class='typeE'>
                            <br>
                                f($argument) = $value
                            </div>";
                            break;
                    }

                    
                }


                // Вычисление и вывод максимального, минимального, среднего арифметического и суммы значений функции
                // Проверяем, что все значения массива $values являются числами
                // Проверка наличия значений и числовых данных в массиве
                if (!empty($values) && count(array_filter($values, 'is_numeric')) > 0) {
                    // Фильтрация числовых значений
                    $numericValues = array_filter($values, 'is_numeric');

                    $max = round(max($numericValues), 3);
                    $min = round(min($numericValues), 3);
                    $average = round(array_sum($numericValues) / count($numericValues), 3);
                    $sum = round(array_sum($numericValues), 3);

                    echo "<br>Максимальное значение: $max<br><br>";
                    echo "Минимальное значение: $min<br><br>";
                    echo "Среднее арифметическое: $average<br><br>";
                    echo "Сумма значений: $sum<br>";
                } else {
                    echo 'Невозможно рассчитать максимальное, минимальное, среднее арифметическое и сумму значений функции, так как введенные данные некорректны';
                }
            }    


            function dowhile_func($startArgument, $numValues, $step, $layoutType, $values){
                echo "<p>Цикл с постусловием</p>";
            
                $i = 0;
                do {
                    $k = $i + 1;
                    $argument = $startArgument + ($i * $step);


                    if ($argument == 100) {
                        $value = 'Ошибка';
                    } else {
                        if ($argument <= 10) {
                            $value = round($argument*$argument*($argument-2)+4,3);
                        } elseif ($argument > 10 && $argument < 20) {
                            $value = round(11*$argument-55, 3);
                        } else {
                            $value = round(($argument-100)/(100-$argument)-$argument/10, 3);
                        }
                    }
                    $values[] = $value;
            
                  
                    switch($layoutType){
                        case 'A':
                            echo "f($argument) = $value<br><br>";
                            break;
                        case 'B':
                            echo "<ul><li>f($argument) = $value</li></ul>";
                            break;
                        case 'C':
                            echo "<ol start='$k'><li>f($argument) = $value</li></ol>";
                            break;
                        case 'D':
                            echo "<div class='typeD'><table>
                            <tr>
                                <td>#</td>
                                <td>Аргумент функции</td>
                                <td>Значение функции</td>
                            </tr>
                            <tr>
                                <td>$i</td>
                                <td>$argument</td>
                                <td>$value</td>
                                </tr>
                            </table>
                            </div>";
                        break;
                        case 'E':
                                echo "<div class='typeE'>
                            <br>
                                f($argument) = $value
                            </div>";
                            break;
                    }

            
                    $i++;
                } while ($i < $numValues);
            
            
                // Вычисление и вывод максимального, минимального, среднего арифметического и суммы значений функции
                // Проверяем, что все значения массива $values являются числами
                // Проверка наличия значений и числовых данных в массиве
                if (!empty($values) && count(array_filter($values, 'is_numeric')) > 0) {
                    // Фильтрация числовых значений
                    $numericValues = array_filter($values, 'is_numeric');
            
                    $max = round(max($numericValues), 3);
                    $min = round(min($numericValues), 3);
                    $average = round(array_sum($numericValues) / count($numericValues), 3);
                    $sum = round(array_sum($numericValues), 3);
            
                    echo "<br>Максимальное значение: $max<br><br>";
                    echo "Минимальное значение: $min<br><br>";
                    echo "Среднее арифметическое: $average<br><br>";
                    echo "Сумма значений: $sum<br>";
                } else {
                    echo 'Невозможно рассчитать максимальное, минимальное, среднее арифметическое и сумму значений функции, так как введенные данные некорректны';
                }
            }
                


            //for_func($startArgument, $numValues, $step, $layoutType, $values);  
            //while_func($startArgument, $numValues, $step, $layoutType, $values); 
            dowhile_func($startArgument, $numValues, $step, $layoutType, $values);         
        }
        ?>    

    </main>

    <footer>
        <div class="footer-info">
            <?php
            echo "<footer><p>Тип верстки: $layoutType</p></footer>";
            ?>
            <p>ilffeza@gmail.com</p>
        </div>
    </footer>
</body>
</html>