<?php
$file = 'view.txt';
$current = file_get_contents($file);
$current .= $_POST['id']."\n";
file_put_contents($file, $current); // записываем id вакансии, которую мы посмотрели
echo 'ok';
?>
