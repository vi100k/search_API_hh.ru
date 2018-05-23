<?php
$view = file('view.txt', FILE_IGNORE_NEW_LINES); //здесь лежит список вакансий, которые мы уже смотрели
$stop = array('.net','c#','c++'); //перечисляем все, с чем мы не хотим работать для исключения, все в нижнем регистре
$ch = curl_init($_POST['url']);
curl_setopt ($ch, CURLOPT_USERAGENT, 'autosearch');
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , 'Authorization: Bearer XXX' )); // не забудьте сменить токен XXX
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch);
$temp = json_decode($data, true);
$temp['id'] = str_replace('"','',$temp['id']);

if (in_array($temp['id'], $view)) { //исключаем вакансию, если уже смотрели
    echo '';
	return;
}
$temp['description'] = mb_strtolower($temp['description']);
$n = 0;
foreach ($stop as $s) { // в этом цикле мы проверяем, есть ли в описании вакансии скилы, которые мы исключили выше, если их более 1, то исключаем вакансию
	if (stristr($temp['description'], $s) !== FALSE) {
		$n++;
		if ($n>1) {
			echo '';
			return;
		}
	}
}
if ($temp['salary']['from'] && $temp['salary']['from']<80000) {echo '';} // проверяем, чтобы нижняя граница зп была не меньше 80к, поскольку по запросу зп 90к в выдаче могут быть вакансии и с зп 10к-120к
else {
	echo $data;
}
?>
