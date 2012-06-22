$(document).ready(function() {
  $('#left-arrow').click(previousPhotos);
  $('#right-arrow').click(nextPhotos);
  displayArrows();
});

$(document).keydown(function(e){
    if (e.keyCode == 37) { 
       previousPhotos();
       return false;
    }
    if (e.keyCode == 39) { 
       nextPhotos();
       return false;
    }
});

function toggleModal(src) {
	$('#viewing').attr('src',src);
	$('#myModal').modal('toggle');
}

function previousPhotos() {
  if (page > 0) {
    page--;
    turnPage();
  }
}

function nextPhotos() {
  if (page < lastPage) {
    page++;
    turnPage();
  }
}

function turnPage() {
    for (i=0; i<16;i++) {
      photoIndex = i+page*photosPerPage;
      if (photoIndex < photos.length) {
        $('#photo'+i).attr("alt",photos[photoIndex]);
        $('#photo'+i).attr("onclick","toggleModal('photos/"+photos[photoIndex]+"');");
        $('#photo'+i).attr("src","photos/thumbnails/"+photos[photoIndex]);
        $('#photo'+i).show();
      } else {
        $('#photo'+i).hide();
      }
    }
    displayArrows();
}

function displayArrows() {
  if (page == 0) {
    $('#left-arrow').hide();
  } else {
    $('#left-arrow').show();
  }
  if (page == lastPage) {
    $('#right-arrow').hide();
  } else {
    $('#right-arrow').show();
  }
}
