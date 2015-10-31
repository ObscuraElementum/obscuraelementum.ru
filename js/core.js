var leftPanel = document.getElementById('leftpanel');
var btnMenu = document.getElementById('btnmenu');
var ttl = document.getElementById('ttl');
var dropMenu = document.getElementById('dropmenu');
var content = document.getElementById('cb');
var logo = document.getElementById('logo');
var login = document.getElementById('login');
var loginBtn = document.getElementById('loginBtn');
var password = document.getElementById('pas');
var validpass = document.getElementById('pass');
var sumbit = document.getElementById('sumbit');
var reglogin = document.getElementById('log');


window.onresize = oetit();
window.onload = oetit();

function displayPanel() {
    leftPanel.style.left = '0px';
    btnMenu.style.marginLeft = '205px';
    ttl.innerHTML = 'OE';
    ttl.style.marginLeft = '240px';
    btnMenu.classList.toggle('rotare');
    loginBtn.style.display = "none";
    btnMenu.setAttribute('onclick', 'hidePanel();');
}

function hidePanel() {
    leftPanel.style.left = '-200px';
    btnMenu.style.marginLeft = '5px';
    btnMenu.classList.remove('rotare');
    ttl.innerHTML = 'Obscura Elementum';
    ttl.style.marginLeft = '50px';
    oetit();
    loginBtn.style.display = "block";
    btnMenu.setAttribute('onclick', 'displayPanel();');
}

function oetit() {
    var scrWid = window.screen.availHeight;
    if (scrWid <= 720)
        ttl.innerHTML = 'OE';
}

function showmenu(event, element) {
    element.classList.toggle('dropmenu');
    leftPanel.style.fontSize = "10px";
    element.setAttribute('onclick', 'hidemenu(event, this);');
}

function hidemenu(event, element) {
    element.classList.remove('dropmenu');
    leftPanel.style.fontSize = "22px";
    element.setAttribute('onclick', 'showmenu(event, this);');
}

function showsubmenu(event, element) {
    element.classList.toggle('dropmenu');
    element.setAttribute('onclick', 'hidesubmenu(event, this);');
}

function hidesubmenu(event, element) {
    element.classList.remove('dropmenu');
    element.setAttribute('onclick', 'showsubmenu(event, this);');
}

function togglelogin() {
    login.classList.toggle('loginshow');
}

function hidelogin() {
    login.classList.remove('loginshow');
}