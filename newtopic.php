<?php
if (!isset($_SESSION[auth])) {
	session_start();
}
$repl=array(" ","\\", "\f", "\e","\t", "\n","\r","\v", "\$", "*", "?",  "&");
$sended=str_replace($repl, "",$_POST[send]);
$name=str_replace($repl, "",$_POST[name]);
$sinfo=str_replace($repl, "",$_POST[smalinfo]);
$info=str_replace($repl, "",$_POST[info]);
$link=str_replace($repl, "",$_POST[link]);


if($_FILES[userfile][size]==0){go==false;}else{$go=true;}
if(!$_FILES[dw][size]==0){
    $fileNam=$_FILES[dw][name];
    $fileRas= new SplFileInfo($fileNam);
		$fileRas=$fileRas->getExtension();
    if($fileRas=='php' or $fileRas=='html' or$fileRas=='css' or$fileRas=='js'){$fileRas=='txt';}
    $gggg=tempnam('media/files/',$_SESSION[npc]);
	$sw='/var/www/u0100975/data/www/obscuraelementum.ru/media/img/';
	$gggg=str_replace($sw, "", $gggg);
	copy($_FILES[dw][tmp_name], 'media/files/'.$gggg.'.'.$fileRas);
	$dw='/media/files/'.$gggg.'.'.$fileRas;}elseif(!empty($link)){$link=$_POST[link];$dw=$link;}else{$dw=NULL;}
$filtera=$_POST[filtera];
$filterb=$_POST[filterb];
$paje='Создать запись';
if(!empty($sended)){$sended=true;}else{$sended=false;}
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
if($filtera=='WoT PC' && $filterb=='Моды'){
	$fil=2;
}elseif($filtera=='WoT PC' && $filterb=='Мaнуал'){
	$fil=4;
}elseif($filtera=='WoT PC' && $filterb=='Видео'){
	$fil=3;
}elseif($filtera=='WoT Bitz' && $filterb=='Моды'){
	$fil=5;
}elseif($filtera=='WoT Bitz' && $filterb=='Мaнуал'){
	$fil=7;
}elseif($filtera=='WoT Bitz' && $filterb=='Видео'){
	$fil=6;
}else{
	$fil=0;
}
if ($_SESSION[auth]===100 && !$sended){
	print join('', file('html/makeform.html'));
}elseif($_SESSION[auth]===100 && $sended){print'<p id=sucsess>Ваша запись обрабатывается сервером =) Возможно она уже отправленна в базу данных(проверьте). Запрос не обработается если:НЕ УКАЗАННЫ ОБЯЗАТЕЛЬНЫЕ ПРАМЕТРЫ ФОРМЫ, НЕТУ ЛОГО ИЛИ ОНО ИМЕЕТ НЕИЗВЕСТНЫЙ ФОРМАТ!</p>';}else{print'<p id=error>Вы не авторизованны!</p>';}
print join("", file("html/footer.html"));
if (!empty($name)&&!empty($info)&&!empty($sinfo)&& $_SESSION[auth]===100 && $_FILES['userfile']['type']==' image/gif' && $go)
{
	$h=tempnam('media/img/',$_SESSION[npc]);
	$s='/var/www/u0100975/data/www/obscuraelementum.ru/media/img/';
	$h=str_replace($s, "", $h);
	copy($_FILES[userfile][tmp_name], 'media/img/'.$h.'.gif');
	$h='<img src="/media/img/'.$h.'.gif">';
	$str=array($name, $sinfo, $info, $_SESSION[npc], $h, $fil, $dw);
	$sql='INSERT INTO topics (name, smallinfo, info, posted, img, filter, download) VALUES  (?, ?, ?, ?, ?, ?, ?)';
	$sth=$db->prepare($sql);
	$sth->execute($str);
}elseif (!empty($name)&&!empty($info)&&!empty($sinfo)&& $_SESSION[auth]===100 && $_FILES['userfile']['type']=='image/png' && $go)
{
	$name=$_POST[name];
$info=$_POST[info];
$sinfo=$_POST[smalinfo];
	$h=tempnam('media/img/',$_SESSION[npc]);
	$s='/var/www/u0100975/data/www/obscuraelementum.ru/media/img/';
	$h=str_replace($s, "", $h);
	copy($_FILES[userfile][tmp_name], 'media/img/'.$h.'.png');
	$h='<img src="/media/img/'.$h.'.png">';
	$str=array($name, $sinfo, $info, $_SESSION[npc], $h, $fil, $dw);
	$sql='INSERT INTO topics (name, smallinfo, info, posted, img, filter, download) VALUES  (?, ?, ?, ?, ?, ?, ?)';
	$sth=$db->prepare($sql);
	$sth->execute($str);
}elseif (!empty($name)&&!empty($info)&&!empty($sinfo)&& $_SESSION[auth]===100 && $_FILES['userfile']['type']=='image/jpeg' && $go)
{
	$name=$_POST[name];
$info=$_POST[info];
$sinfo=$_POST[smalinfo];
	$h=tempnam('media/img/',$_SESSION[npc]);
	$s='/var/www/u0100975/data/www/obscuraelementum.ru/media/img/';
	$h=str_replace($s, "", $h);
	copy($_FILES[userfile][tmp_name], 'media/img/'.$h.'.jpg');
	$h='<img src="/media/img/'.$h.'.jpg">';
	$str=array($name, $sinfo, $info, $_SESSION[npc], $h, $fil, $dw);
	$sql='INSERT INTO topics (name, smallinfo, info, posted, img, filter, download) VALUES  (?, ?, ?, ?, ?, ?, ?)';
	$sth=$db->prepare($sql);
	$sth->execute($str);
}elseif (!empty($name)&&!empty($info)&&!empty($sinfo)&& $_SESSION[auth]===100&& $_FILES['userfile']['type']=='image/pjpeg' && $go)
{
	$name=$_POST[name];
$info=$_POST[info];
$sinfo=$_POST[smalinfo];
	$h=tempnam('media/img/',$_SESSION[npc]);
	$s='/var/www/u0100975/data/www/obscuraelementum.ru/media/img/';
	$h=str_replace($s, "", $h);
	copy($_FILES[userfile][tmp_name], 'media/img/'.$h.'.jpg');
	$h='<img src="/media/img/'.$h.'.jpg">';
	$str=array($name, $sinfo, $info, $_SESSION[npc], $h, $fil, $dw);
	$sql='INSERT INTO topics (name, smallinfo, info, posted, img, filter, download) VALUES  (?, ?, ?, ?, ?, ?, ?)';
	$sth=$db->prepare($sql);
	$sth->execute($str);
}elseif (!empty($name)&&!empty($info)&&!empty($sinfo)&& $_SESSION[auth]===100&& $_FILES['userfile']['type']=='image/svg+xml' && $go)
{
	$name=$_POST[name];
$info=$_POST[info];
$sinfo=$_POST[smalinfo];
	$h=tempnam('media/img/',$_SESSION[npc]);
	$s='/var/www/u0100975/data/www/obscuraelementum.ru/media/img/';
	$h=str_replace($s, "", $h);
	copy($_FILES[userfile][tmp_name], 'media/img/'.$h.'.svg');
	$h='<img src="/media/img/'.$h.'.svg">';
	$str=array($name, $sinfo, $info, $_SESSION[npc], $h, $fil, $dw);
	$sql='INSERT INTO topics (name, smallinfo, info, posted, img, filter, download) VALUES  (?, ?, ?, ?, ?, ?, ?)';
	$sth=$db->prepare($sql);
	$sth->execute($str);
}elseif (!empty($name)&&!empty($info)&&!empty($sinfo)&& $_SESSION[auth]===100&& $_FILES['userfile']['type']=='image/tiff' && $go)
{
	$name=$_POST[name];
$info=$_POST[info];
$sinfo=$_POST[smalinfo];
	$h=tempnam('media/img/',$_SESSION[npc]);
	$s='/var/www/u0100975/data/www/obscuraelementum.ru/media/img/';
	$h=str_replace($s, "", $h);
	copy($_FILES[userfile][tmp_name], 'media/img/'.$h.'.tiff');
	$h='<img src="/media/img/'.$h.'.tiff">';
	$str=array($name, $sinfo, $info, $_SESSION[npc], $h, $fil, $dw);
	$sql='INSERT INTO topics (name, smallinfo, info, posted, img, filter, download) VALUES  (?, ?, ?, ?, ?, ?, ?)';
	$sth=$db->prepare($sql);
	$sth->execute($str);
}
?>