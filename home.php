<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <title>M-ZONE</title>

    <!--  320 작으면 phone, 321 - 768 tablet, 769 크면 web -->
    <link rel="stylesheet" media="(min-device-width: 769px)" href="./styles/base.css">
    <link rel="stylesheet" media="(min-device-width: 769px)" href="./styles/header.css">
    <link rel="stylesheet" media="(min-device-width: 769px)" href="./styles/tailer.css">
    <link rel="stylesheet" media="(min-device-width: 769px)" href="./styles/home.css?ver=3">

    <link rel="stylesheet" media="(max-device-width: 768px)" href="./styles/base_mobile.css?ver=2">
    <link rel="stylesheet" media="(max-device-width: 768px)" href="./styles/header_mobile.css">
    <link rel="stylesheet" media="(max-device-width: 768px)" href="./styles/tailer_mobile.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="./scripts/header.js?ver=4"></script>

    <script>
    </script>
  </head>
  <body>
    <div class="total_wrap">
      <!-- HEADER -->
      <center>
      <div class="header_wrap">
        <!--  홈 버튼 생성 영역-->
        <div class="header_left_wrap">
          <div class="header_left_logo_wrap">
              <a href="./home.php"><img id="home" src="./images/header/home.png" alt="홈 로고"></a>
          </div>
        </div>
        <!--  Navigation 생성 영역 -->
        <div class="header_center_wrap">
          <ul id="mainNav" class="header_center_mainNav_wrap">
            <li class="header_center_mainNav_cell_wrap"><h3 id="infoMainNav" >INFO</h3></li>
            <li class="header_center_mainNav_cell_wrap"><h3 id="boardMainNav" >BOARD</h3></li>
            <li class="header_center_mainNav_cell_wrap"><h3 id="galleryMainNav" >GALLERY</h3></li>
            <li class="header_center_mainNav_cell_wrap"><h3 id="guestMainNav" >GUEST</h3></li>
          </ul>
          <ul id="subNav" class="header_center_subNav_wrap">
              <!-- 스크립트로 동적 생성. 함수이름 onSubNavInnerHTML()
              안의 내용 지우는 함수는 offSubNavInnerHTML() -->
          </ul>
        </div>
        <!--  로그인 폼 생성 영역 -->
        <div class="header_right_wrap">
          <div class="header_right_userForm_wrap">
            <div class="header_right_userForm_idDisplay_wrap">
              <?
                if(empty($_COOKIE['login_id'])) {
              ?>
              <h6></h6>
              <?
                } else {
              ?>
              <h6><?= $_COOKIE['login_id'] ?>님</h6>
              <?
                }
              ?>
            </div>
            <div class="header_right_userForm_login_wrap">
              <?
                if(empty($_COOKIE['login_id'])) {
              ?>
              <a href="javascript:animateLoginForm();"><img id="login" src="./images/header/login.png" alt="로그인"></a>
              <?
                } else {
              ?>
              <form id="logoutForm" name="logoutForm" method="post" action="./server/logout.php">
                <a href="javascript:logoutConfirm();"><img id="logout" src="./images/header/logout.png" alt="로그아웃"></a>
              </form>
              <?
                }
              ?>
            </div>
            <div class="header_right_userForm_join_wrap">
              <a href="./agreement.php"><img id="join" src="./images/header/join.png" alt="회원가입"></a>
            </div>
            <div id="loginForm">
              <!-- 동적 할당 영역 -->
            </div>
          </div>
        </div>
      </div>
      </center>
      <center>
      <div class="content_wrap">
        <div class="content_thumbnail_wrap">
          <div class="content_thumbnail_mainImage_wrap">
            <img id="home_img" src="./images/home/home.png" alt="홈이미지">
          </div>
          <div class="content_thumbnail_map_wrap">
            <img id="map_img" src="./images/home/map.png" alt="맵이미지">
          </div>
          <div class="content_thumbnail_notice_wrap">
          </div>
          <div class="content_thumbnail_hotClip_wrap">
          </div>

        </div>
      </div>
    </center>
      <div class="tailer_wrap">
        <center>
        <h5>Copyright(c)2017 M-Zone All rights reserved.<br>
          Designed by Hwang-Yun-Kim<br>
          Jeonbuk Iksan Sindong 272, Wonkwang Univ.</h5>
        </center>
        <div class="tailer_img">
            <img id="tailer_banner" src="./images/tailer/banner.png" alt="테일러배너">
            <a href="http://cafe.naver.com/wkgsmzone" target="_blank"><img id="naver_banner_img" src="./images/tailer/naver.png" onmouseout="this.src='./images/tailer/naver.png'" onmouseover="this.src='./images/tailer/naver_hover.png'" alt="네이버 링크" /></a>
            <a href="https://www.facebook.com/groups/198402046955657/?ref=bookmarks" target="_blank"><img id="facebook_banner_img" src="./images/tailer/facebook.png" onmouseout="this.src='./images/tailer/facebook.png'" onmouseover="this.src='./images/tailer/facebook_hover.png'" alt="페이스북 링크" /></a>
            <a href="" target="_blank"><img id="cyworld_banner_img" src="./images/tailer/cyworld.png" onmouseout="this.src='./images/tailer/cyworld.png'" onmouseover="this.src='./images/tailer/cyworld_hover.png'" alt="싸이월드 링크" /></a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
