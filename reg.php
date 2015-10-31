<?php
if (!isset($_SESSION[auth])) {
	session_start();
}$logIn=$_POST[log];
include ('config/config.php');
$db = new PDO("mysql:host=$HOST;dbname=$DB", $USER, $PASSWORD);
$sth = $db->prepare("SELECT * FROM npc;");
$stg= $db->prepare("SET NAMES utf8;");
$stm = $db->prepare("SELECT  * FROM npc WHERE login='".$logIn."';");
$stm->execute();
$re=$stm->FETCH();
$stg->execute();
if(!$re==NULL&&isset($_POST[log])){
	print'Логин занят....';
}elseif($re=NULL && isset($_POST[log]) && isset($_POST[pas]) && isset($_POST[pass]) && $_POST[pas]==$_POST[pass]){
	print "всё ок";
}elseif(!isset($_POST[log])){
	print'хули ты логин не ввел?';
}elseif(!isset($_POST[name])){
	print'Хули имя не ввел?';
}elseif(!isset($_POST[log])){
	print'хули логин не ввел?';
}elseif(!isset($_POST[mail])){
	print'где email?';
}elseif(!isset($_POST[pas]) && !isset($_POST[pass])){
	print'где пaроли?';
}elseif($_POST[pas]!=$_POST[pass]){
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
	print '<p id="error">Пароли не совпали</p>';
	print"           <form method='post' action='reg.php'>
                Регистрация:<br>
                <div class='logblock'>
                    <input  type='text' required placeholder='Имя*' value='$_POST[name]' id='name' name='name'>
                    <input  type='text' placeholder='Фамилия' id='lnm' value='$_POST[lnm]' name='lnm'>
                    <input  type='email' required placeholder='E-mail*' value='$_POST[mail]' id='mail' name='mail'>
                    <input  type='text' required placeholder='Логин*' value='$_POST[log]' id='log' name='log'>
                    <input  type='password' required placeholder='Пароль*' id='pas' name='pas'>
                    <input type='password' required placeholder='Повтор пароля*' id='pass' name='pass'>
                    <input type='submit' value='Регистация' id='butlog'>
                </div>
            </form>";
	print join("", file("html/footer.html"));
}elseif(isset($_POST[pas])&&isset($_POST[pass])&&$_POST[pas]===$_POST[pass] && $re==NULL && isset($_POST[log])&&isset($_POST[name])&&isset($_POST[mail])){
	$passs=md5(md5($_POST[pas]));
	$filds=array("id","name","family","nik", "login", "password", "email", "zvanie",);
	$val=array("0", $_POST[name], $_POST[lnm], $_POST[log], $_POST[log], $passs, $_POST[mail], "9");
	$sql="INSERT INTO npc (id, name, family, nik, login, password, email, zvanie) VALUES (?,?,?,?,?,?,?,?)";
	$registr=$db->prepare($sql);
	$registr->execute($val) ;
	$sth = $db->prepare("SELECT  * FROM npc WHERE login='".$_POST[log]."';");
	$sth->execute();
	$result = $sth->FETCH();
	$_SESSION[nik]=$result[nik];
	$_SESSION[npc]=$result[id];
	$_SESSION[pas]=$result[password];
	$_SESSION[auth]=100;
	if($_SESSION[auth]=100){header( 'Location: https://obscuraelementum.ru', true, 301 );}
	print $result[name].',вы аторизованны, но зах вы пытаетесь сломать сценарий?';
}
?>