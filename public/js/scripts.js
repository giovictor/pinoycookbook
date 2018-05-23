CKEDITOR.replace('description');
CKEDITOR.replace('ingredients');
CKEDITOR.replace('procedure');

function previewImage() {
    var preview = document.getElementById('preview_img');
    var file    = document.getElementById('thumbnail').files[0];
    var reader  = new FileReader();
  
    reader.onload = function () {
      preview.src = reader.result;
    }
  
    if (file) {
      reader.readAsDataURL(file);
    } else {
      preview.src = "";
    }
  }