<?
print'<form enctype="multipart/form-data" action="/test.php" method="POST"> <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла --> <input type="hidden" name="MAX_FILE_SIZE" value="1572864" /> <!-- Название элемента input определяет имя в массиве $_FILES --> Отправить этот файл: <input name="userfile" type="file" /> <input type="submit" value="Send File" /> </form>'; print_r ($_FILES);
print ($h=tempnam('media/img/',''));print'<br>';
$s='/var/www/u0100975/data/www/obscuraelementum.ru/media/img/';
$h=str_replace($s, "", $h);
print $h;
if(copy($_FILES[userfile][tmp_name], 'media/img/'.$h.'.png')){print'ok';}
?>