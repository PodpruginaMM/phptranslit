<?php
//1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка
$i = 0;
while ($i <= 100) {
	echo $i . " ";
	$i++;
}
echo "<br><br> task 2 <br>";
//2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
//0 – ноль.
//1 – нечетное число.
//2 – четное число.
//3 – нечетное число.
//…
//10 – четное число.

$i = 0;
do {
	if ($i == 0) {
		echo $i . " - ноль.<br>";
	} elseif (($i % 2) > 0 ) {
		echo $i . " - нечетное число.<br>";
	} else {
		echo $i . " - четное число.<br>";
	}
	$i++;
} while ($i <= 10);

echo "<br><br> task 3 <br>";
/*3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким:
Московская область:
Москва, Зеленоград, Клин
Ленинградская область:
Санкт-Петербург, Всеволожск, Павловск, Кронштадт
Рязанская область … (названия городов можно найти на maps.yandex.ru)*/
$reg_cities = array(
"Московская область" => array(
"Москва", "Зеленоград", "Клин"),
"Ленинградская область" => array(
"Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"),
"Рязанская область" => array(
"Шацк", "Спасск-Рязанский", "Касимов", "Кораблино", "Михайлов")
);
//print_r($reg_cities);
foreach ($reg_cities as $i => $value) {
    echo $i . ":<br>";
    $cityqty = count($value);
    foreach ($value as $j => $value2) {
    	if($j == $cityqty-1) {
    		echo $value2 . "<br>";
    	} else { 
    	echo $value2 . ", ";
    	}
    }
}
echo "<br><br> task 4 <br>";
/*4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
Написать функцию транслитерации строк.*/
$translitbase = array(
'а' => 'a',
'б' => 'b',
'в' => 'v',
'г' => 'g',
'д' => 'd',
'е' => 'e',
'ё' => 'yo',
'ж' => 'zh',
'з' => 'z',
'и' => 'i',
'й' => 'i',
'к' => 'k',
'л' => 'l',
'м' => 'm',
'н' => 'n',
'о' => 'o',
'п' => 'p',
'р' => 'r',
'с' => 's',
'т' => 't',
'у' => 'u',
'ф' => 'f',
'х' => 'kh',
'ц' => 'ts',
'ч' => 'ch',
'ш' => 'sh',
'щ' => 'sh\'',
'ъ' => '',
'ы' => 'i',
'ь' => '\'',
'э' => 'e',
'ю' => 'you',
'я' => 'ya',
' ' => ' ',
'-' => '-'
);
function translit($text, $translitbase) {
	$textsmall = mb_strtolower($text);
	//var_dump($textsmall);
	$result = '';
	//$arraytxt = str_split($text, 1);
	//var_dump($arraytxt);
	$letters = array();
	preg_match_all('/./u', $textsmall, $letters);
	//var_dump($letters);
	$length = count($letters[0]);
	for($i=1;$i<=$length; $i++) {
		$result = $result . $translitbase[$letters[0][$i-1]];
	}
	//var_dump($length);
	return $result;
	};

echo translit('Транслитерация успешно работает', $translitbase);

echo "<br><br> task 5 <br>";
/*5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.*/
function abolishSpaces($text) {
	//var_dump($textsmall);
	$result = '';
	$letters = array();
	preg_match_all('/./u', $text, $letters);
	//var_dump($letters);
	$length = count($letters[0]);
	for($i=1;$i<=$length; $i++) {
		if ($letters[0][$i-1] == ' ') {
			$result = $result . "_";
		} else {
		$result = $result . $letters[0][$i-1];
		}
	}
	//var_dump($length);
	return $result;
	};

echo abolishSpaces("Ну и где ваши пробелы? Теперь их нет^ ^");

echo "<br><br> task 6 <br>";
/*6. В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через PHP. Необходимо представить пункты меню как элементы массива и вывести их циклом. Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать.*/
$myList = array("bread", "eggs", "milk", "potatoes", "cheese");
echo "<h3>To buy</h3>";
function createUl($list) {
	$result = "<ul>
		";
	foreach ($list as $value) {
		$addition = "<li>" . $value . "</li>
			";
		$result = $result . $addition;
	}
	$result = $result . "</ul>";
	return $result;
};

echo createUl($myList);
?>




