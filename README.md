# search_API_hh.ru

Короткий скрипт работы с API hh.ru для автопоиска вакансий<br>
Запись просмотренных вакансий ведется в txt, без использования mysql, для облегчения использования скрипта простыми пользователями, но обязательное наличие php<br>
Вы можете добавить проверки по "навыкам", "названию" и прочих полей по примеру проверки навыков в описании и заработной плате<br>
<br>
Схема работы: при попадании на страницу index.html через запросы AJAX нам выдаются вакансии<br>
При клике на вакансию открывается новое окно с вакансией на сайте, а сама вакансия записывается в ридлист и далее не будет в выдаче
