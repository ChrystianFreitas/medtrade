function previewFile($preview, $foto) {
    var preview = document.querySelector($preview);
    var file    = document.querySelector($foto).files[0];
    var reader  = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}