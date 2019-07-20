<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    
    <title>M ZONE :: 엠존소개</title>

    <!-- base.css -->
    <link rel="stylesheet" href="./styles/base.css">
    <!-- header.css -->
    <link rel="stylesheet" href="./styles/header.css?ver=2">
    <link rel="stylesheet" href="./styles/tailer.css">
    <link rel="stylesheet" href="./styles/information.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!--  Header 관련 함수들.-->
    <script src="./scripts/header.js?ver=4"></script>
  </head>
  <body>
    <div class="total_wrap">
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
            <ul class="header_center_mainNav_wrap">
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
        <!-- 여기 안에다가 객체 생성하면 됨. -->
        <div class="content_representImage_wrap">
          <img src="./images/logo.png" alt="">
        </div>

        <div class="infomation_wrap">
          <div class="introduce_wrap">
            <div class="introduce_title">
                <h4>INTRODUCE</h4>
            </div>
            <!--
            <div class="introduce_location">
              <div id="daumRoughmapContainer1488336111153" class="root_daum_roughmap root_daum_roughmap_landing"></div>
              <script charset="UTF-8" class="daum_roughmap_loader_script" src="http://dmaps.daum.net/map_js_init/roughmapLoader.js"></script>
              <script charset="UTF-8">
               new daum.roughmap.Lander({
                   "timestamp" : "1488336111153",
                     "key" : "g9tb",
                       "mapWidth" : "100%",
                         "mapHeight" : "100%"
                      }).render();
                      </script>
            </div>
          -->
            <div class="introduce_image">
                <img id="intro_img" src="./images/infomation/introduce.png" alt="소개이미지">
            </div>
          </div>
          <div class="member_wrap">
            <div class="member_title">
              <h4>MEMBER</h4>
            </div>
            <div class="member_image">
              <img id="member_1" src="./images/infomation/member_1.png" onmouseout="this.src='./images/infomation/member_1.png'" onmouseover="this.src='./images/infomation/member_1_hover.png'" alt="멤버이미지1">
              <img id="member_2" src="./images/infomation/member_2.png" onmouseout="this.src='./images/infomation/member_2.png'" onmouseover="this.src='./images/infomation/member_2_hover.png'" alt="멤버이미지2">
              <img id="member_3" src="./images/infomation/member_3.png" onmouseout="this.src='./images/infomation/member_3.png'" onmouseover="this.src='./images/infomation/member_3_hover.png'" alt="멤버이미지3">
              <img id="member_4" src="./images/infomation/member_4.png" onmouseout="this.src='./images/infomation/member_4.png'" onmouseover="this.src='./images/infomation/member_4_hover.png'" alt="멤버이미지4">
            </div>
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
            <a href="" target="_blank"><img id="cyworld_banner_img" src="./images/tailer/cyworld.png" onmouseout="this.src='./images/tailer/cyworld.png'" onmouseover="this.src='./images/tailer/cyworld_hover.png'" alt="싸이월드 링크" /></a>        </div>
      </div>
    </div>
  </body>
</html>
