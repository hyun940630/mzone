// HEADER.JS  헤더에 관련된 스크립트들.

//HEADER ICON들에 HOVER 함수
$(document).ready(function () {
  $('#home').hover(function () {
    $(this).attr('src', './images/header/home_hover.png');
  }, function () {
    $(this).attr('src', './images/header/home.png');
  });

  $('#login').hover(function () {
    $(this).attr('src', './images/header/login_hover.png');
  }, function () {
    $(this).attr('src', './images/header/login.png');
  });

  $('#logout').hover(function () {
    $(this).attr('src', './images/header/logout_hover.png');
  }, function () {
    $(this).attr('src', './images/header/logout.png');
  });

  $('#join').hover(function () {
    $(this).attr('src', './images/header/join_hover.png');
  }, function () {
    $(this).attr('src', './images/header/join.png');
  });

});

//HEDAER 영역에 마우스를 댔을 때 SUB_NAV가 나타나는 함수.
  $(document).ready(function() {
    $('.header_center_wrap').hover(function () {
      $('.header_wrap').animate({ height: 140}, 'fast');
      $('.header_left_wrap, .header_center_wrap, .header_right_wrap').animate({ height: 140 }, 'fast');
      $('.header_center_subNav_wrap').animate({ height: 90 }, 'fast');

      // 로그인 창이 켜져있는 상태에서 메인 메뉴 하버가 발생할 경우 로그인 창은 없앤다.
      if(loginForm_flag == true) {
        offAnimateLoginForm();
      }
      // subNav 내용 그리기.
      onSubNavInnerHTML();
    }, function() {
      // 헤더가 다 펼쳐지지 전에 커서가 헤더를 나갈 경우 clearQueue()를 활용 애니메이션 중지.
      $('.header_wrap').clearQueue();
      $('.header_left_wrap, .header_center_wrap, .header_right_wrap').clearQueue();
      $('.header_center_subNav_wrap').clearQueue();
      // $('.header_wrap').css('height', '50px');

      $('.header_wrap').animate({ height: 50}, 'fast');
      $('.header_left_wrap, .header_center_wrap, .header_right_wrap').animate({ height: 50 }, 'fast');
      $('.header_center_subNav_wrap').animate({ height: 0 }, 'fast');

      // subNav 내용 지우기.
      offSubNavInnerHTML();
    });
  });

  // Header에서 커서가 들어갈 때 subNav 내용을 그린다.
  function onSubNavInnerHTML() {
    var subNav = document.getElementById('subNav');
    var innerhtml = "";

    innerhtml += "<li class=\"header_center_subNav_cell_wrap\">";
    innerhtml +=  "<ul>";
    innerhtml +=    "<a href=\"./information.php\"><li><h4 id=\"informationSubNav\">엠존소개</h4></li></a>";
    innerhtml +=    "<a href=\"./history.php\"><li><h4 id=\"historySubNav\">엠존역사</h4></li></a>";
    innerhtml +=  "</ul>";
    innerhtml += "</li>"
    innerhtml += "<li class=\"header_center_subNav_cell_wrap\">";
    innerhtml +=  "<ul>";
    innerhtml +=    "<a href=\"\"><li><h4 id=\"noticeSubNav\">공지사항</h4></li></a>";
    innerhtml +=    "<a href=\"./freeboard_list.php?no=0\"><li><h4 id=\"freeSubNav\">자유게시판</h4></li></a>";
    innerhtml +=    "<a href=\"\"><li><h4 id=\"introuduceSubNav\">자기소개</h4></li></a>";
    innerhtml +=  "</ul>";
    innerhtml += "</li>"
    innerhtml += "<li class=\"header_center_subNav_cell_wrap\">";
    innerhtml +=  "<ul>";
    innerhtml +=    "<a href=\"./videoGallery.php\"><li><h4 id=\"videoGallerySubNav\">영상갤러리</h4></li></a>";
    innerhtml +=    "<a href=\"./photoGallery.php\"><li><h4 id=\"photoGallerySubNav\">사진갤러리</h4></li></a>";
    innerhtml +=  "</ul>";
    innerhtml += "</li>";
    innerhtml += "<li class=\"header_center_subNav_cell_wrap\">";
    innerhtml +=  "<ul>";
    innerhtml +=    "<a href=\"./guestBook.php\"><li><h4 id=\"guestBookSubNav\">방명록</h4></li></a>";
    innerhtml +=  "</ul>";
    innerhtml += "</li>";

    subNav.innerHTML = innerhtml;

    onNavHover();
  }

  // 메뉴에서 커서가 메뉴쪽으로 갔을 때 각 메뉴들의 hover를 일으키는 함수.
  function onNavHover() {
    $('#informationSubNav').hover(function () {
      $(this).css('color', '#eeeeee');
      $('#infoMainNav').css('color', '#cc3d3d');
    }, function () {
      $(this).css('color', '#ffffff');
      $('#infoMainNav').css('color', '#ffffff');
    });

    $('#historySubNav').hover(function () {
      $(this).css('color', '#eeeeee');
      $('#infoMainNav').css('color', '#cc3d3d');
    }, function () {
      $(this).css('color', '#ffffff');
      $('#infoMainNav').css('color', '#ffffff');
    });

    $('#noticeSubNav').hover(function () {
      $(this).css('color', '#eeeee');
      $('#boardMainNav').css('color', '#cc3d3d');
    }, function () {
      $(this).css('color', '#ffffff');
      $('#boardMainNav').css('color', '#ffffff');
    });

    $('#freeSubNav').hover(function () {
      $(this).css('color', '#eeeeee');
      $('#boardMainNav').css('color', '#cc3d3d');
    }, function () {
      $(this).css('color', '#ffffff');
      $('#boardMainNav').css('color', '#ffffff');
    });

    $('#introuduceSubNav').hover(function () {
      $(this).css('color', '#eeeeee');
      $('#boardMainNav').css('color', '#cc3d3d');
    }, function () {
      $(this).css('color', '#ffffff');
      $('#boardMainNav').css('color', '#ffffff');
    });

    $('#videoGallerySubNav').hover(function () {
      $(this).css('color', '#eeeeee');
      $('#galleryMainNav').css('color', '#cc3d3d');
    }, function () {
      $(this).css('color', '#ffffff');
      $('#galleryMainNav').css('color', '#ffffff');
    });

    $('#photoGallerySubNav').hover(function () {
      $(this).css('color', '#eeeeee');
      $('#galleryMainNav').css('color', '#cc3d3d');
    }, function () {
      $(this).css('color', '#ffffff');
      $('#galleryMainNav').css('color', '#ffffff');
    });

    $('#guestBookSubNav').hover(function () {
      $(this).css('color', '#eeeeee');
      $('#guestMainNav').css('color', '#cc3d3d');
    }, function () {
      $(this).css('color', '#ffffff');
      $('#guestMainNav').css('color', '#ffffff');
    });
  }

  //Header에서 커서가 빠져나올 때 그려져있던 subNav를 지운다.
  function offSubNavInnerHTML() {
    var subNav = document.getElementById('subNav');
    subNav.innerHTML = "";
  }

  //전역변수 플래그 선언.
  loginForm_flag = false;

  function animateLoginForm() {
    if(loginForm_flag == false) {
      // 로그인 창이 닫혀 있을 경우 연다.
      onAnimateLoginForm();
    } else {
      // 로그인 창이 열려 있을 경우 닫는다.
      offAnimateLoginForm();
    }
  }

  // 로그인 버튼 클릭시 로그인 폼이 나타나는 애니메이션 함수.
  function onAnimateLoginForm() {
    var loginForm = document.getElementById('loginForm');
    var html = "";

    $('#loginForm').css('border-color', '#ffffff');
    $('#loginForm').animate({ width: 250, height: 160 }, 'fast');

    html += "<form action=\"./Server/loginServer.php\" method=\"POST\" name=\"login\" >";
    html +=   "<input type=\"text\" id=\"login_id\" name=\"login_id\" class=\"loginForm_id\" placeholder=\" 아이디\" onKeyPress='enter()' />";
    html +=   "<input type=\"password\" id=\"login_pw\" name=\"login_pw\" class=\"loginForm_pw\" placeholder=\" 비밀번호\" onKeyPress='enter()' />";
    html +=   "<a href=\"javascript:login();\"><input type=\"button\" class=\"loginForm_submit\" value=\"로그인\" /></a>";
    html += "</form>";

    loginForm.innerHTML = html;
    loginForm_flag = true;
  }

  function offAnimateLoginForm() {
    var loginForm = document.getElementById('loginForm');
    $('#loginForm').animate({ width: 0, height: 0 }, 'fast');
    $('#loginForm').css('border-color', '#000000');

    loginForm.innerHTML = "";
    loginForm_flag = false;
  }

  function login() {
    var id = document.getElementById('login_id');
    var pw = document.getElementById('login_pw');

    if(id.value == "") {
      alert("\n 아이디를 입력하세요");
      id.focus();
      return;
    }

    if(pw.value == "") {
      alert("\n 비밀번호를 입력하세요");
      pw.focus();
      return;
    }

    document.login.submit();
    return false;
  }

function enter() {
	//엔터키를 눌렀을 때 login() 함수를 실행하는 함수.

  alert("asdasd");
	if(event.keyCode == 13) {
		login();
	}
}

  function logoutConfirm() {
    var result = confirm("로그아웃 하시겠습니까?");

    if(result) {
          document.logoutForm.submit();
    }
  }
