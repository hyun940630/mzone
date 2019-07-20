// Global Variable .....
html = "";

// 비디오 클릭했을 때 비디오가 시작되거나 멈추는 함수.
$(document).ready(function () {
  // alert(id + ", " + uploader + ", " + uploadDate + ", " + view + ", " + favorite + ", " + url);
  $('#bestVideo, .content_gallery_content_cell_thumbnail_wrap').click(function () {
    if(this.paused) {
      this.play();
    }  else {
      this.pause();
    }
  });
});

//Content_wrap 영역의 height값을 바꾸는 함수.
function changeContentHeight() {
  var height = $('.content_wrap').css('height');

  // CONTENT HEIGHT 늘리기.
  $('.content_wrap').animate({
    height: parseInt(height) + 3000
  }, 'fast');

  alert(parseInt(height));
  window.scrollTo(0, parseInt(height) + 3000);
}

function drawVideoGallery() {
  for(var i=0; i<10; i++) {
    // html = videoGalleryInnerHTML();
  }
}

$(document).ready(function () {
  videoGalleryLikeHover();
});

function videoGalleryLikeHover() {
  $('.content_gallery_content_cell_description_like_icon_img').hover(function () {
    $(this).attr('src', './images/videoGallery/like_hover.png');
  }, function () {
    $(this).attr('src', './images/videoGallery/like.png');
  });
}

function increaseLikeCount(gallery_id) {

  var xmlHttp = null;

  // xmlhttp 에 객체 할당.
  if(window.XMLHttpRequest) {
    // Code for IE7+, Firefox, Chrome, Opera, Safari
    xmlHttp = new XMLHttpRequest();
  } else {
    // Code for IE6, IE5
    try {
      xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch(Ex) {
      try {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
      } catch(Ex2) {
        xmlHttp = null;
      }
    }
  }

  //콜백함수 정의
  xmlHttp.onreadystatechange = function() {
    if( xmlHttp.readyState == 4 && xmlHttp.status == 200) {
      document.getElementById("videoGalleryLike_" + gallery_id).innerHTML = "<h6>" + xmlHttp.responseText + "</h6>";
    }
  }

  xmlHttp.open("GET", "./server/increaseLikeCountServer.php?galleryId=" + gallery_id, true);
  xmlHttp.send();
}
