<?php
if (!isset($_SESSION[auth])) {
	session_start();
}
$paje='Создать запись';
print ('<html><head><title>'.$paje.'</title>');
print join('', file('html/head.html'));
if (isset($_SESSION[nik])) {
	print join('', file('html/authpanel.html'));
	print join('', file('html/menu.html'));
	print '            <div class="add">
                <a href="/zak.php">Рекламное место сдаётся</a>
            </div>
        </div>
        <main>
            <section>';
	print join('', file('html/panel.html'));
	print ($_SESSION['nik'].'</button>
 </header>');
} else {
	print join('', file('html/loginform.html'));
	print join('', file('html/menu.html'));
	print '            <div class="add">
                <a href="/zak.php">Рекламное место сдаётся</a>
            </div>
        </div>
        <main>
            <section>';
	print join('', file('html/panel.html'));
	print join('', file('html/paneledns.html'));
}
include ('config/config.php');
$db = new PDO("mysql:host=$HOST;dbname=$DB", $USER, $PASSWORD);
$stg= $db->prepare("SET NAMES utf8;");
$stg->execute();
if($_FILES['userfile']['type']==' image/gif'or $_FILES['userfile']['type']=='image/png'or $_FILES['userfile']['type']==' image/jpeg' or $_FILES['userfile']['type']==JPEG){
	$go=true;
}else{$go=false;}
if($filtera=='WoT PC' && $filterb=='Моды'){$fil=2;}elseif($filtera=='WoT PC' && $filterb=='Мaнуал'){$fil=4;}elseif($filtera=='WoT PC' && $filterb=='Видео'){$fil=3;}
elseif($filtera=='WoT Bitz' && $filterb=='Моды'){$fil=5;}elseif($filtera=='WoT Bitz' && $filterb=='Мaнуал'){$fil=7;}elseif($filtera=='WoT Bitz' && $filterb=='Видео'){$fil=6;}else{$fil=0;}
if ($_SESSION[auth]===100){
	print join('', file('html/makeform.html'));
}else{print'<p id=error>Вы не авторизованны!</p>';}
print join("", file("html/footer.html"));
if (!empty($_POST[name])&&!empty($_POST[info])&&!empty($_POST[smalinfo])&& $_SESSION[auth]===100 && $go)
{
	$h=tempnam('media/img/',$_SESSION[npc]);
	$s='/var/www/u0100975/data/www/obscuraelementum.ru/media/img/';
	$h=str_replace($s, "", $h);
	copy($_FILES[userfile][tmp_name], 'media/img/'.$h.'.png');
	$h='<img src="/media/img/'.$h.'.png">';
	$str=array($_POST[name], $_POST[smalinfo], $_POST[info], $_SESSION[npc], $h, $fil, $_POST[dw]);
	$sql='INSERT INTO topics (name, smallinfo, info, posted, img, filter, download) VALUES  (?, ?, ?, ?, ?, ?, ?)';
	$sth=$db->prepare($sql);
	$sth->execute($str);
}
?>