<?
if (!isset($_SESSION[auth]))
	{
		session_start();
	}
include("config/config.php");
$db = new PDO("mysql:host=$HOST;dbname=$DB", $USER, $PASSWORD);
$logIn=$_POST[log];
$pas=$_POST[pas];
$stg= $db->prepare("SET NAMES utf8;");
$stg->execute();
$sth = $db->prepare("SELECT  * FROM npc WHERE login='".$logIn."';");
$sth->execute();
$result = $sth->FETCH();
if(md5(md5($pas))==$result[password]){
	$_SESSION[nik]=$result[nik];
	$_SESSION[npc]=$result[id];
	$_SESSION[pas]=$result[password];
	$_SESSION[auth]=100;
	if($_SESSION[auth]=100){
		header( 'Location: https://obscuraelementum.ru', true, 301 );
	}
}elseif($_POST[pas]==NULL or $_POST[log]==NULL){
		print 'Я тебе НЕ верю!!! Ты, код страницы меняешь!';
}elseif(md5(md5($pas))!=$result[password]){
	$paje='Вход:';
	print ('<html><head><title>'.$paje.'</title>');
	print join('', file('html/head.html'));
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
	print '<p id="error">Вы ввели неправильный логин/пароль</p>';
	print '            <form method="post" action="login.php">
                <div class="logblock">
                    <input type="text" required placeholder="Логин" autofocus id="log" name=log>
                    <input type=password required placeholder="Пароль" id="pas" name=pas>
                    <input type="submit" value="Вход" id="butlog">
                </div>
            </form>';
	print join("", file("html/footer.html"));
}
?>