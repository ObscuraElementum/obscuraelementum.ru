<?php
if (!isset($_SESSION[auth])) {
	session_start();
}
$repl=array(" ","\\", "\f", "\e","\t", "\n","\r","\v", "\$");
$logIn=str_replace($repl, "",$_POST[log]);
print"<!--$logIn-->";
include ('config/config.php');
$db = new PDO("mysql:host=$HOST;dbname=$DB", $USER, $PASSWORD);
$sth = $db->prepare("SELECT * FROM npc;");
$stg= $db->prepare("SET NAMES utf8;");
$stm = $db->prepare("SELECT  * FROM npc WHERE login='".$logIn."';");
$stm->execute();
$re=$stm->FETCH();
$stg->execute();
if(!$re==NULL&&isset($_POST[log])){
	$paje='Регистрация:';
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
	print '<p id="error">Логин занят</p>';
	print"           <form method='post' action='reg.php'>
                Регистрация:<br>
                <div class='logblock'>
                    <input  type='text' required placeholder='Имя*' value='$_POST[name]' id='name' name='name'>
                    <input  type='text' placeholder='Фамилия' id='lnm' value='$_POST[lnm]' name='lnm'>
                    <input  type='email' required placeholder='E-mail*' value='$_POST[mail]' id='mail' name='mail'>
                    <input  type='text' required placeholder='Логин*'  id='log' name='log'>
                    <input  type='password' required placeholder='Пароль*' id='pas' name='pas'>
                    <input type='password' required placeholder='Повтор пароля*' id='pass' name='pass'>
                    <input type='submit' value='Регистация' id='butlog'>
                </div>
            </form>";
	print join("", file("html/footer.html"));
}elseif($_POST[log]==0){
	$paje='Регистрация:';
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
	print '<p id="error">Логина нету О_о. Ламер сраный!</p>';
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
}elseif($_POST[name]==0){
	$paje='Регистрация:';
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
	print '<p id="error">Имени нету О_о. Ламер сраный!</p>';
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
}elseif($_POST[pas]==0 && $_POST[pass]==0){
			$paje='Регистрация:';
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
	print '<p id="error">Паролей нету О_о. Ламер сраный!</p>';
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
}elseif(!isset($_POST[mail])){
			$paje='Регистрация:';
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
	print '<p id="error">Почты нету О_о. Ламер сраный!</p>';
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
}elseif(!isset($_POST[pas])){
			$paje='Регистрация:';
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
	print '<p id="error">Паролей нету О_о. Ламер сраный!</p>';
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
}elseif(!isset($_POST[pass])){	$paje='Регистрация:';
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
	print '<p id="error">Паролей нету О_о. Ламер сраный!</p>';
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
	print join("", file("html/footer.html"));}elseif($_POST[pas]!=$_POST[pass]){
		$paje='Регистрация:';
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
}elseif(isset($_POST[pas]) and isset($_POST[pass]) and $_POST[pas]===$_POST[pass] and $re==NULL and isset($_POST[log]) and isset($_POST[name]) and isset($_POST[mail])){
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
