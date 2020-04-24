const canvas = document.querySelector('canvas');
const ctx = canvas.getContext("2d");

var image = new Image();
image.src = ''

function upload(){
    ctx.drawImage(image, 0, 0, canvas.width, canvas.height)
}