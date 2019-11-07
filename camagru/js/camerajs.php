
// open the camera and handle the boxes ==========================================================================================
navigator.getMedia = ( navigator.getUserMedia || // use the proper vendor prefix
                       navigator.webkitGetUserMedia ||
                       navigator.mozGetUserMedia ||
                       navigator.msGetUserMedia);

navigator.getMedia({video: true}, function() {
  // webcam is available
}, function() {
  // webcam is not available
  document.getElementById('capture').style.display="none";
  document.getElementById('videoa').style.display="none";
  document.getElementById('err1').innerHTML="Since your webcam is not available you can upload your own image and boom ";
});
// open the camera and handle the boxes ==========================================================================================
var confirm = 3;
var canvas = document.getElementById("my_canvas");
var context = canvas.getContext("2d");
const video = document.getElementById('videoa');
const errorMsgElement = document.querySelector('span#errorMsg');
const constraints = {audio: false,video: {width: 640, height: 480}};
const photo = document.getElementById('cat13');
var ff= document.getElementById('btnDisplay');

// Access webcam
async function init() {
	try {
		const stream = await navigator.mediaDevices.getUserMedia(constraints);
		handleSuccess(stream);
	} catch (e) {
		errorMsgElement.innerHTML = `navigator.getUserMedia error:${e.toString()}`;
	}
}
// Success
function handleSuccess(stream) {
window.stream = stream;
video.srcObject = stream;
}
// Load init
init();
// ===============================================================================
document.getElementById('capture').addEventListener('click', function() {
canvas.removeAttribute("hidden");
photo.style.display = 'none';
// drawImage(imageSrc, sx, sy, sw, sh, dx, dy, dw, dh) <-<-<-<-<-<-<-<-<-<-<-<-<-<
context.drawImage(videoa, 0, 0, 600, 400);
photo.setAttribute('src', canvas.toDataURL('image/png'));
});

// write on canvas ==========================================================================================
var imageLoader = document.getElementById('imageLoader');

imageLoader.addEventListener('change', handleImage, false);

function handleImage(e){
var reader = new FileReader();
reader.onload = function(event){
var img = new Image();
img.onload = function(){
canvas.width = 600;
canvas.height = 400;
context.drawImage(img,0,0,600,400);
}
img.src = event.target.result;
}
reader.readAsDataURL(e.target.files[0]);
}

function noSnap(){
	ff.removeAttribute("hidden"); 
}
function noSnap2() {
	confirm = 1;
	//alert(confirm);
}
function showCanvas(){
canvas.removeAttribute("hidden");
photo.style.display = 'none';

}
function showit(){
<?php
for($i = 0; $i <=23; $i++)
{
	$name = "sticker$i.png";
	$did = "sticker$i";
	if (file_exists('img/stickers/'.$name))
		echo("document.getElementById('$did').disabled = false;");
		
}?>
}
var id = "borderimg";

function myFunction($id){
id = $id;
}
function writeMessage(canvas, message) {
var context = canvas.getContext('2d');
context.clearRect(0, 0, canvas.width, canvas.height);
context.font = '18pt Calibri';
context.fillStyle = 'black';
context.fillText(message, 10, 25);
}
function getMousePos(canvas, evt) {
var rect = canvas.getBoundingClientRect();
return {
x: evt.clientX - rect.left,
y: evt.clientY - rect.top
};
}
var canvas = document.getElementById('my_canvas');
var context = canvas.getContext('2d');
canvas.addEventListener('click', function(evt) {
	if (confirm == 1)
	ff.removeAttribute("hidden"); 
var mousePos = getMousePos(canvas, evt);
var name = "sti"+id;
var sticker = document.getElementById(name);

if (id == 11 || id == 21)
	context.drawImage(sticker,0, 0, 600, 400);
else
context.drawImage(sticker,mousePos.x - 50, mousePos.y - 50, 150, 150);
// var message = 'Mouse position: ' + Math.floor(mousePos.x) + ',' + Math.floor(mousePos.y);
// writeMessage(canvas, message);
}, false);


var ctx = canvas.getContext('2d');


function handleImage(e){
    var reader = new FileReader();
    reader.onload = function(event){
        var img = new Image();
        img.onload = function(){
            canvas.width = 600;
            canvas.height = 400;
            ctx.drawImage(img,0,0,600,400);
        }
        img.src = event.target.result;
    }
    reader.readAsDataURL(e.target.files[0]);     
}
btnDisplay.addEventListener("click", function(){

  document.getElementById('imgConverted').value = canvas.toDataURL();
 
});
