<?php
if (!isset($_SESSION[auth])) {
	session_start();
}
include ('../config/config.php');
$post=$_GET[post];
$db = new PDO("mysql:host=$HOST;dbname=$DB", $USER, $PASSWORD);
$topic = $db->prepare("SELECT * FROM topics WHERE post=$post;");
$code= $db->prepare("SET NAMES utf8;");
$code->execute();
$topic->execute();
$result = $topic->FETCH();
$st= $db->prepare("SELECT * FROM npc WHERE id=$result[posted];");
$st->execute();
$r=$st->FETCH();
$hab='news';
$paje=$result[name].'|OE';
print ('<html><head><title>'.$paje.'</title>');
print join('', file('../html/head.html'));
if (isset($_SESSION[nik])) {
	print join('', file('..html/authpanel.html'));
	print join('', file('../html/menu.html'));
	print '            <div class="add">
                <a href="/zak.php">Рекламное место сдаётся</a>
            </div>
        </div>
        <main>
            <section>';
	print join('', file('../html/panel.html'));
	print ($_SESSION['nik'].'</button>
 </header>');
} else {
	print join('', file('../html/loginform.html'));
	print join('', file('../html/menu.html'));
	print '            <div class="add">
                <a href="/zak.php">Рекламное место сдаётся</a>
            </div>
        </div>
        <main>
            <section>';
	print join('', file('../html/panel.html'));
	print join('', file('../html/paneledns.html'));
}
		print('<div class="content" id="cb">
 <div class="contenttext">
 <header><time id="time" datetime="'.$result[date].'">'.$result[date].'</time> <h3 id="title">'.$result[name]. '</h3><h4 id="avtor">'.$r[nik].'</h4></header>'.$result[img].' <p id="prev">'.$result[info].'</p><footer><a>Коментарии</a><a href="#ссылка">Подробне</a></footer></div>');
print '  <div id="comments" name="comm">
<div id="coment">
 <header>
 <a>user</a>
 </header>
 <div id="comentText">
<p>Даю старт!</p>
 </div>
 </div>
</div>';
print join("", file("../html/footer.html"));
?>