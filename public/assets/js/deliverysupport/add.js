function renderImage(ev){
    var canvas = $('#qr-canvas')[0],
    context = canvas.getContext('2d'),
    image = new Image();
    var files = ev.target.files;
    $.each(files, function(index, item) {
        var reader = new FileReader();
        reader.onload = function(file) {
            var dataUrl = file.target.result;
            image.src = dataUrl;
            image.onload = function() {
                canvas.width = image.width;
                canvas.height = image.height;
                context.drawImage(image, 0, 0 ,this.width, this.height, 0, 0, canvas.width, canvas.height);
            }
        }
        reader.readAsDataURL(item);
    });
}
