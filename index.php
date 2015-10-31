<?php
if (!isset($_SESSION[auth])) {
	session_start();
}
if(isset($_GET[out]))
	{
		unset($_SESSION[nik]);
		unset($_SESSION[npc]);
		unset($_SESSION[pas]);
		unset($_SESSION[auth]);
		if(!isset($_SESSION[auth])){
			header( 'Location: https://obscuraelementum.ru', true, 301 );
		}
		}
$shet=0;
$hab='news';
$paje='Главная';
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
$sth = $db->prepare("SELECT * FROM topics WHERE filter=1;");
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
 <header><time id="time" datetime="'.$result[$i][date].'">'.$result[$i][date].'</time> <h3 id="title">'.$result[$i][name]. '</h3><h4 id="avtor">'.$l[0][nik].'</h4></header>'.$result[$i]['img'].' <p id="prev">'.$result[$i]['smallinfo'].'</p><footer><a>Коментарии</a><a href="/bilders/showtopic.php?post='.$result[$i][post].'">Подробне</a></footer></div>');
	}
}
print join("", file("html/footer.html"));
/*for ($i=0;
 $i<=$num;
 $i++) {
	print('<div class="content" id="cb">
 <div class="contenttext">
 <header><time id="time" datetime="'.$result[$i][date].'">'.$result[$i][date].'</time> <h3 id="title">'.$result[$i][name]. '<h3 id="title">Дизайн сайта обновлён</h3><h4 id="avtor">');
}

print( '<div class="content" id="cb">
 <div class="contenttext">
 <header><time id="time" datetime="||20.08.2016">20.08.2016</time> <h3 id="title">Дизайн сайта обновлён</h3><h4 id="avtor">AlexVio</h4></header>
 <img>
 <p id="prev">Краткое описание</p>
 <footer><a>Коментарии</a><a href="#ссылка">Подробне</a></footer>
 </div>
 <div id="comments">
 <div id="coment">
 <header>
 <a>user</a>
 <button id="plus">+</button>
 <a id="rating">10</a>
 <button id="minus">-</button>
 </header>
 <div id="comentText">
 
 </div>
 </div>

 <div id="coment">
 <header>
 <a>user</a>
 <button id="plus">+</button>
 <a id="rating">10</a>
 <button id="minus">-</button>
 </header>
 <div id="comentText">
 </div>
 </div>

 <div id="coment">
 <header>
 <a>user</a>
 <button id="plus">+</button>
 <a id="rating">10</a>
 <button id="minus">-</button>
 </header>
 <div id="comentText">
 
 </div>
 </div>
 </div>
 </div>
 </section>
 </main>
 </body>
</html><!--');
print_r ($result);
print '-->';*/
?>