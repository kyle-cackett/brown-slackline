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

function deleteProfile(filename) {
  var confirmed = confirm("Are you sure you want to delete "+filename+"?");
  if (confirmed) {
    $.ajax({
      url: 'profiles.php',
      type: 'DELETE',
      data: {filename:filename},
      success: function (data, textStatus, jqXHR) {
        location.reload();
      },
      error: function () {
       console.log("Error!");
      }
    });  
  }
  
}

function editableProfile(fullname,filename) {
  /*Use destructuring assignment when it becomes standard*/
  var selector = '#' + fullname;
  var firstname = fullname.split("-")[0];
  var lastname = fullname.split("-")[1];
  var profile = $(selector+' .profile-text').html();
  var interests = $(selector+' .interests').html().split(': ')[1];

  /*Add form controls to the DOM populated with current profile info*/
  $(selector).wrapInner('<form enctype="multipart/form-data" action="profiles.php" method="post">');
  $(selector+' .span6').prepend('<input type="hidden" name="filename" value="'+filename+'"/><input id="edit-first-name" class="name-input" type="text" name="firstName" value="'+firstname+'"/><input id="last-name" class="name-input" type="text" name="lastName" value="'+lastname+'"/><br/>');
  $(selector+' .profile-text').replaceWith('<textarea id="profile" name="profile" rows="8">'+profile+'</textarea><br/>');
  $(selector+' .interests').replaceWith('<input class="four-fifths-width" name="interests" type=text value="'+interests+'"/>');
  $(selector+' .span6').append('<input type="submit" value="Submit" class="pull-right btn btn-inverse"/>');
  $(selector+' .span2').append('<button class="headshot-control btn btn-success">Headshot</button><input id="headshot-input" class="headshot-control masked-file-input" type="file" name="headShot" onchange="previewUpload(this,\''+selector+'-headshot\');"/>');
  $(selector+' .span4').append('<button class="actionshot-control btn btn-success">Action Shot</button><input id="actionshot-input" class="actionshot-control masked-file-input" type="file" name="actionShot" onchange="previewUpload(this,\''+selector+'-actionshot\');"/>');
}