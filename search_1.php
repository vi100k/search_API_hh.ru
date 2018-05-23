<?php
$ch = curl_init(''); //в кавычки вставляем нужный запрос с get параметрами, например...
// https://api.hh.ru/vacancies?order_by=publication_time&area=2&enable_snippets=true&text=%D0%92%D0%B5%D0%B1-%D0%BF%D1%80%D0%BE%D0%B3%D1%80%D0%B0%D0%BC%D0%BC%D0%B8%D1%81%D1%82&clusters=true&search_period=1&salary=90000&only_with_salary=true&from=cluster_compensation&per_page=100
// Все параметры get описаны в документации API hh.ru
//Поскольку моей целью был автопоиск последних добавленных вакансий (за один день), то мне достаточно выдачи первой страницы вакансий 
curl_setopt ($ch, CURLOPT_USERAGENT, 'autosearch'); // заголовок user agent обязателен для работы
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , 'Authorization: Bearer XXX' )); // XXX - ваш токен. таким образом запрос будет от Вашего юзера. Необходимо для видимости вакансий, закрытых для неавторизованных
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch);
echo $data;
?>
