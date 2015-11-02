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
if ($_SESSION[auth]===100){
	print join('', file('html/makeform.html'));
}else{print'<p id=error>Вы не авторизованны!</p>';}
print join("", file("html/footer.html"));
if (isset($_POST[name])&& $_SESSION[auth]===100)
{
	
	$str=array($_POST[name], $_POST[smalinfo], $_POST[info], $_SESSION[id], $_POST[img], $fil, $_POST[dw]);
	$sql='INSERT INTO topics (name, smallinfo, info, posted, img, filter, download) VALUES  (?, ?, ?, ?, ?, ?, ?)';
	$sth=$db->prepare($sql);
	$sth->execute($str);
}
?>