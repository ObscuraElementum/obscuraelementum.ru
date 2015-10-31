<?php
if (!isset($_SESSION[auth])) {
	session_start();
}
$shet=0;
$hab='news';
$paje='Моды для WoT';
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
$sth = $db->prepare("SELECT * FROM topics WHERE filter=5;");
$stm=$db->prepare("SELECT * FROM 'npc';");
$stg= $db->prepare("SET NAMES utf8;");
$stg->execute();
$sth->execute();
$result = $sth->fetchAll();
$stm->execute();
$r=$stm->fetchAll();
$num=count($result);
if ($num==0) {
	print '<p>новостей нет</p>';
} else {
	for ($i=0; 	$i<$num;	$i++) {
		$st= $db->prepare("SELECT * FROM npc WHERE id=".$result[$i]['posted'].";");
		$st->execute();
		$l=$st->fetchAll();
		print('<div class="content" id="cb">
 <div class="contenttext">
 <header><time id="time" datetime="'.$result[$i][date].'">'.$result[$i][date].'</time> <h3 id="title">'.$result[$i][name]. '</h3><h4 id="avtor">'.$l[0][nik].'</h4></header>'.$result[$i]['img'].' <p id="prev">'.$result[$i]['smallinfo'].'</p><footer><a href="/bilders/showtopic.php?post='.$result[$i][post].'">Подробне</a></footer></div>');
	}
}
print join("", file("html/footer.html"));
?><?php

?>