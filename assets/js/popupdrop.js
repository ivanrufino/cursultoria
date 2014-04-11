// JavaScript Document
function initDragDrop() {
__dragX = 0; 
__dragY = 0; 
__dragId = ''; 
__dragging = false;
document.body.onmousedown = __dragDown;
document.body.onmousemove = __dragMove;
document.body.onmouseup = function() { __dragging = false; };
}

function __dragDown(e) {
e = e ? e : window.event;
__dragEl = document.getElementById(__dragId) || null;
var _target = document.all ? e.srcElement : e.target;
  if(!__dragEl || !(/drag/.test(_target.className))) return;
__dragX = e.clientX - __dragEl.offsetLeft;
__dragY = e.clientY - __dragEl.offsetTop;
__dragging = true;
};

function __dragMove(e) {
	if(typeof __dragging == 'undefined' || !__dragging) return;
e = e ? e : window.event;
__dragEl.style.left = (e.clientX - __dragX)+'px';
__dragEl.style.top = (e.clientY - __dragY)+'px';
};


function abrePopUp(URL){  
	window.open(URL,'Foto_Ampliada','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=400,height=400');  
}  
