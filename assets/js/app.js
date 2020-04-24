/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
$("#slide-image").cropper();
$('.carousel').carousel({
    interval: 2000
  })


function crop(){
    $("#slide-image").cropper('getCroppedCanvas').toBlob(function (blob){
        var formData = new FormData();

        formData.append('croppedImage',blob);

        //current slide
        $.ajax('/'), {
            method: "POST",
            data: formData,
            processData:false,
            contentType: false,
            success:function() {
                console.log('Upload success')
            },
            error: function() {
                console.log('Upload error')
            }
        }

    });
}