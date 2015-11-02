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
$comm=$db->prepare("SELECT * FROM comm WHERE fore=$post");
$comm->execute();
$st->execute();
$r=$st->FETCH();
$com=$comm->fetchAll();
$num=count($com);
$col=$num-1;
$paje=$result[name].'|OE';
print ('<html><head><title>'.$paje.'</title>');
print join('', file('../html/head.html'));
if (isset($_SESSION[nik])) {
	print join('', file('../html/authpanel.html'));
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
 <header><time class="timekom" id="time" datetime="'.$result[date].'">'.$result[date].'</time> <h3 id="title">'.$result[name]. '</h3><h4 id="avtor">'.$r[nik].'</h4></header>'.$result[img].' <p id="prev">'.$result[info].'</p><footer>');
if($result[download]==NULL){
	print'</footer></div>';
}else{print "<a href='$result[download]'>Скачать</a></footer></div>";}
print '  <div id="comments" name="comm">';
for ($i=0; 	$i<$num;	$i++) {
	$namee=$db->prepare("SELECT * FROM npc WHERE id=".$com[$col][id]);
	$namee->execute();
	$name=$namee->FETCH();
	print "<div id='coment'>
 <header>
 <a>".$name[nik]."</a><time id= datetime='".$com[$col][date]."'>".$com[$col][date]."</time> </header>
 <div id='comentText'>
<p>".$com[$col][text]."</p>
 </div>
 </div>";
$col=$col-1;
}
print '</div>';
print join("", file("../html/footer.html"));
?>