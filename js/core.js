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
var menusvg = document.querySelector("#btnmenu svg");
var visibleLeftPanel = false;

window.onload = function () {
    oetit();
}

window.onresize = function () {
    oetit();
}

function displayPanel() {

    if (visibleLeftPanel) {
        leftPanel.style.left = '-200px';
        btnMenu.style.marginLeft = '5px';
        ttl.innerHTML = 'Obscura Elementum';
        ttl.style.marginLeft = '50px';
        oetit();
        menusvg.classList.remove("active");
        loginBtn.style.display = "block";
        visibleLeftPanel = false;
    } else {
        leftPanel.style.left = '0px';
        btnMenu.style.marginLeft = '205px';
        ttl.innerHTML = 'OE';
        oetit();
        ttl.style.marginLeft = '240px';
        menusvg.classList.toggle("active");
        loginBtn.style.display = "none";
        visibleLeftPanel = true;
    }
}

function oetit() {
    var scrWid = document.documentElement.clientWidth;
    if (scrWid <= 720)
        ttl.innerHTML = 'OE';
    if (scrWid > 720)
        ttl.innerHTML = 'Obscura Elementum';
    ttl.style.marginLeft = '50px';
    loginBtn.style.display = "block";
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