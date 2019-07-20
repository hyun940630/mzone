<?
  error_reporting(E_ALL ^ E_DEPRECATED);

  $conn = mysql_connect("localhost", "root", "1234");
  mysql_select_db("mzone", $conn);

  $query = "SELECT * FROM guestbook ORDER BY id DESC";
  $result = mysql_query($query, $conn);
  $total = mysql_affected_rows();

  $pagesize = 5;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <title>M-ZONE :: 게스트존</title>

    <link rel="stylesheet" href="./styles/base.css">
    <link rel="stylesheet" href="./styles/header.css?ver=2">
    <link rel="stylesheet" href="./styles/tailer.css">
    <link rel="stylesheet" href="./styles/guestBook.css?ver=3">

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

          <div class="guest_book_title">
            <h4>GUEST BOOK</h4>
          </div>
          <div class="guest_book">
            <form action="guestBook_insert.php" method="post">
            <table id="write_box" border="0px">
              <tr>
                <td><input type="text" id="name" name="name" value="" placeholder="이름"></td>
                <td><input type="password" id="pass" name="pass" value="" placeholder="비밀번호"></td>
              </tr>
              <tr>
                <td colspan=4>
                  <textarea id="content" name="content" placeholder="내용을 입력해주세요."></textarea>
                </td>
              </tr>
              <tr>
                <td colspan=4 ><input id="submit_bt" type="submit" value="등록하기"></td>
              </tr>
            </table>
          </form>
          </div>

          <div class="guest_record_title">
            <h4>GUEST RECORD</h4>
          </div>

          <div class="guest_record">
            <!-- guest_record part -->
            <?
              for($i=0; $i < $total; $i++) {
                if($i < $total) {
                  mysql_data_seek($result, $i);
                  $row = mysql_fetch_array($result);
            ?>
            <div class="guest_record_cell_wrap">
              <div class="namedate_box">
                <br><br>
                <div class="name">
                  <h5>NAME :</h5>
                </div>
                <div class="name_output">
                  <h5><?echo $row['name']?></h5>
                </div>
                <div class="date">
                  <h5>DATE :</h5>
                </div>
                <div class="date_output">
                  <h5><?echo date("Y-m-d", strtotime($row['wdate'])) ?></h5>
                </div>
              </div>

              <div class="read_box">
                <h5><?echo $row['content']?></h5>
              </div>
              <div class="delete">
                <a href="guestbook_delete.php?id=<?=$row['id']?>"><input id="delete_bt" type="button" value="삭제하기"></a>
              </div>
            </div>
            <?
                }
              }
            ?>
          </div>
        </div>

        <!-- end guestBook part -->

        <!-- <div class="tailer_wrap">
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
        </div> -->
      </div>
    </center>
  </body>
</html>
