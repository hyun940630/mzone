<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>초 허접 게시판</title>
    <style>
      td { font-size:9pt; }
      A:link { font:9pt; color:black; text-decoration:none; font-family:굴림; font-size:9pt; }
      A:visited { text-decoration:none; color:black; gont-size:9pt; }
      A:hover { text-decoration:underline; color:black; font-size:9pt; }
    </style>

    <link rel="stylesheet" href="./styles/base.css">
    <link rel="stylesheet" href="./styles/tailer.css">
    <link rel="stylesheet" href="./styles/header.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!--  Header 관련 함수들.-->
    <script src="./scripts/header.js?ver=4"></script>
  </head>

  <body topmargin=0 leftmargin=0 text=#464646>
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
      <div class="content_wrap">
        <center>
          <!-- 대표 이미지 -->
          <div class="content_representImage_wrap">
            <img src="./images/logo.png" alt="">
          </div>

        <!-- 입력된 값을 다음 페이지로 넘기기 위해 FORM을 만든다. -->
        <form action="freeboard_insert.php" method="post">
          <table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor=#777777>
            <tr>
              <td height=20 align=center bgcolor=#999999>
                <font color="white"><b>글 쓰 기</b></font>
              </td>
            </tr>
            <!-- 입력부분 -->
            <tr>
              <td bgcolor=white>&nbsp;
                <table>
                  <tr>
                    <td width=60 align=left>이름</td>
                    <td align=left>
                      <input type="text" name="name" size="20" maxlength="25">
                    </td>
                  </tr>
                  <tr>
                    <td width=60 align=left>이메일</td>
                    <td align=left>
                      <input type="text" name="email" size="20" maxlength="25">
                    </td>
                  </tr>
                  <tr>
                    <td width=60 align=left>비밀번호</td>
                    <td align=left>
                      <input type="password" name="pass" size="8" maxlength="8">
                      (수정, 삭제시 반드시 필요)
                    </td>
                  </tr>
                  <tr>
                    <td width=60 align=left>제목</td>
                    <td align=left>
                      <input type="text" name="title" size="60" maxlength="35">
                    </td>
                  </tr>
                  <tr>
                    <td width="60" align=left>내용</td>
                    <td align=left>
                      <textarea name="content" rows="15" cols="65"></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td colspan=10 align=center>
                      <input type="submit" value="글 저장하기">
                      &nbsp; &nbsp;
                      <input type="reset" value="다시 쓰기">
                      &nbsp; &nbsp;
                      <input type="button" value="되돌아가기" onclick="history.back(-1)">
                    </td>
                  </tr>
                </table>
              </td>
            </tr>

          </table>
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
            <a href="" target="_blank"><img id="cyworld_banner_img" src="./images/tailer/cyworld.png" onmouseout="this.src='./images/tailer/cyworld.png'" onmouseover="this.src='./images/tailer/cyworld_hover.png'" alt="싸이월드 링크" /></a>
        </div>
      </div>
    </div>
  </body>
</html>
