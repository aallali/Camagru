// open the camera and handle the boxes ==========================================================================================
// 
var par = document.getElementById('par');
var div = document.getElementById('div');
var w = 500;
div.style.width = w + 'px';
var s = 0;
function movefunction() {
  par.style.left = s +'px';
  if (s <= 0 - w+1) {
    s = w-1;
  }else {
    s=s-1;
  }

}
window.onload = setInterval(movefunction,20);

var canvas = document.getElementById("my_canvas1");
const videoo = document.getElementById('videoa');
var context = canvas.getContext("2d");

var inputFile = document.getElementById("take-picture");
const btnDisplay = document.getElementById("btnDisplay");
const imgConverted = document.getElementById('imgConverted');



const constraintss = {
    audio: false,
    video: {
        width: 600,
        height: 400
    }
};
var imageLoader = document.getElementById('imageLoader');
    imageLoader.addEventListener('change', handleImage, false);

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

// Access webcam ===================================================================
async function init() {
        try {
            const stream = await navigator.mediaDevices.getUserMedia(constraintss);
            handleSuccess(stream);
        } catch (e) {}
    }

    // Success  ====================================================================
function handleSuccess(stream) {
        window.stream = stream;
        videoo.srcObject = stream;
    }

    // Load init ==================================================================
init();

 // ===============================================================================
document.getElementById('capture').addEventListener('click', function() {
  // drawImage(imageSrc, sx, sy, sw, sh, dx, dy, dw, dh) <-<-<-<-<-<-<-<-<-<-<-<-<-<
    context.drawImage(videoo, 0, 0, 600, 400);
    // photo.setAttribute('src', canvas.toDataURL('image/png'));
});
 // ======= =======================================================================

var id = 0;
 function myFunction($id){
 id = $id;
} 

// ==================================================================================
function initCanvas(){
  var ctx = document.getElementById('my_canvas1').getContext('2d');
  ctx.canvas.addEventListener('mousemove', function(event){
    console.log("mouse");
    var mouseX = event.clientX - ctx.canvas.offsetLeft;
    var mouseY = event.clientY - ctx.canvas.offsetTop;
  });
  ctx.canvas.addEventListener('click', function(event){
    var mouseX = event.clientX - ctx.canvas.offsetLeft;
    var mouseY = event.clientY - ctx.canvas.offsetTop;
    var x = mouseX - 40;
    var y = mouseY - 40;
    var name = "sti" + id;
    var sticker = document.getElementById(name);
    if (id == 11)
      context.drawImage(sticker,0, 0, 600, 400);
    else 
      if (id == 21)
      context.drawImage(sticker,0, 0, 600, 400);
    else
        context.drawImage(sticker,x-50, y-50, 200, 200);
    });
}
window.addEventListener('load', function(event) {
  initCanvas();
});