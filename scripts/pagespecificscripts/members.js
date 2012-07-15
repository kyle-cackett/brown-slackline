$(document).ready(function() {
  $('#new-member-info').hide();
  $('.preview').hide();
});

function previewUpload(input, previewImgID) {
  if(input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $(previewImgID).attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
    $(previewImgID).show();
  }
}