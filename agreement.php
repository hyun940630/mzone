<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <title>M ZONE :: 회원가입</title>

    <link rel="stylesheet" href="./styles/base.css">
    <link rel="stylesheet" href="./styles/header.css?ver=2">
    <link rel="stylesheet" href="./styles/tailer.css">
    <link rel="stylesheet" href="./styles/agreement.css?ver=4">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!--  Header 관련 함수들.-->
    <script src="./scripts/header.js?ver=4"></script>
    <script src="./scripts/agreement.js?ver=3"></script>

    <script>
    // 중복확인 유무를 확인.
    flag_idCheck = false;

    // AJAX를 확용한 비동기 중복확인 이벤트 함수
    function ajaxIdCheck() {
      var id = document.getElementById('id');
      var idValue = id.value;
      var xmlHttp = null;

      if(idValue == "") {
        alert("아이디를 입력해 주세요.");
        id.focus();
        return;
      }

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
          document.getElementById("idCheckDisplay").innerHTML = xmlHttp.responseText;

          // 중복확인 유무를 확인하는 flag_idCheck변수.
          if(xmlHttp.responseText == "사용 가능한 아이디 입니다.") {
            flag_idCheck = true;
          }
        }
      }

      xmlHttp.open("GET", "./server/idCheck.php?idValue=" + idValue, true);
      xmlHttp.send();
    }
    </script>
  </head>
  <body>
    <div class="total_wrap">
      <center>
      <!-- HEADER -->
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
              <!-- 스크립트로 동적 생성. 함수이름 onSubNavInnerHTML() 참조,
              안의 내용 지우는 함수는 offSubNavInnerHTML() 참조 -->
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

        <div class="content_wrap">
          <center>
            <!-- register_main_img -->
            <img id="register_main_img" src="./images/logo.png" alt="register_main_img">
              <form action="./server/agreementServer.php" id="register" name="entry" method="POST">
                <!-- id, passowrd table -->
                <table border=1 id="table_id_password" >
                  <tr>
                    <td colspan="2">
                      <input type="text" name="id" id="id" placeholder=" 아이디" value="" onkeydown="flagIdCheckReset()" />
                      <input type="button" id="id_check" value="중복확인" onclick="ajaxIdCheck();">
                    </td>
                  </tr>
                  <tr id="idCheckDisplay">

                  </tr>
                  <tr>
                    <!-- password box옆에 열쇠모양이나 자물쇠모양 이미지 넣으면 좋겠음^^ -->
                    <td><input type="password" name="pw" id="pw" class="register_style1" placeholder=" 비밀번호"></td>
                  </tr>
                  <tr>
                    <td><input type="password" id="pw_check" class="register_style1" placeholder=" 비밀번호 확인"></td>
                  </tr>
                  <tr id="pwMatchDisplay">
                    <!-- 비밀번호와 비밀번호 확인이 서로 일치한지 확인하는 공간 -->

                  </tr>
                </table>

                <!-- information table -->
                <table border=1 id="table_information">
                  <tr>
                    <td><input type="name" name="name" id="name" class="register_style1" placeholder=" 이름" size="width:10px; height:380px;"></td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <input type="button" value="남" id="male" onclick="sexButtonClick(value)">
                      <input type="button" value="여" id="female" onclick="sexButtonClick(value)">
                      <!-- 남, 여 버튼 선택에 따라서 다음 hidden 영역에 저장되는 value가 달라진다. -->
                      <input type="hidden" name="sex" id="sex" value="">
                    </td>
                  <tr>
                    <td colspan="2">
                      <input type="text" name="email" id="email" placeholder=" 이메일 (직접입력 시 도메인까지)">
                      <select name="select_email" name="select_email" id="select_email">
                        <option value="">선택</option>
                        <option value="">직접입력</option>
                        <option value="@naver.com">네이버</option>
                        <option value="@hanmail.net">한메일</option>
                        <option value="@gmail.com">지메일</option>
                        <option value="@nate.com">네이트</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td><input type="text" name="tel" id="tel" class="register_style1" placeholder=" 전화번호 (-없이 입력)"></td>
                  </tr>
                  <tr>
                    <td><input type="text" name="cardinalNumber" id="cardinalNumber" class="register_style1" placeholder=" 기수를 입력해주세요!!"></td>
                  </tr>
                </table>

                <!-- register button -->
                <!-- 가입버튼을 이미지 버튼으로 만들까 생각중... -->
                <table>
                  <tr>
                    <td colspan="2" align="right">
                      <a href="javascript:join();"><input type="button" value="가입하기" id="join_btn"></a>
                    </td>
                  </tr>
                </table>
              </form>
              <form action="./server/idCheck.php" method="post" name="idCheckForm">
                <input id="idCheckJustSubmit" name="idCheckJustSubmit" type="hidden" value="">
              </form>
          </center>
        </div>

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
