<?php
  error_reporting(E_ALL ^ E_DEPRECATED);

  //데이터 베이스 연결하기
  include "freeboard_db_info.php";

  #LIST 설정
  #1. 한 페이지에 보여질 게시물의 수
  $page_size=10;

  #2. 페이지 나누기에 표시될 페이지의 수
  $page_list_size=10;

  #############################################################################
  //$no 값이 안 넘어 오거나 잘못된 (음수)값이 넘어오는 경우 0으로 처리
  $no = $_GET['no'];
  if (!$no || $no < 0) $no=0;
  #############################################################################

  //데이터 베이스에서 페이지의 첫 번째 글($no) 부터 $page_size만큼의  글을 가져온다.
  $query = "SELECT * FROM freeboard ORDER BY id DESC LIMIT $no, $page_size";
  $result = mysql_query($query, $conn);

  //총 게시물 수를 구한다.
  //count를 통해 구할 수 있는데 count(항목)과 같은 밥법으로 사용한다. *은 모든 항목을 뜻한다.
  //총 해당 항목의 값을 가지는 게시물의 개수가 얼마인가를 묻는 것이다.
  //따라서 전체 글 수가 된다. count(id)와 같은 방법도 가능하지만
  //이례적으로 count(*)가 조금 빠르다. 일반적으로는 *가 느리다.
  $result_count=mysql_query("SELECT count(*) FROM freeboard", $conn);
  $result_row=mysql_fetch_row($result_count);
  $total_row = $result_row[0];

  //결과의 첫 번째 열이 count(*)의 결과다.
  #############################################################################
  #총 페이지 계산
  if ($total_row <= 0) $total_row = 0;  //총 게시물의 값이 없을 경우 기본값으로 세팅
  // 총 게시물에 1을 뺀 뒤 페이지 사이즈로 나누고 소수점 이하를 버린다.

  $total_page = floor($total_row-1 / $page_size);
  #현재 페이지 계산
  $current_page = floor(($no)/$page_size);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>계층형 게시판</title>
    <style>
      td { font-size:9pt; }
      A:link { font:9pt; color:black; text-decoration:none; font-family:굴림; font-size:9pt; }
      A:visited { text-decoration:none; color:black; font-size:9pt; }
      A:hover { text-decoration:underline; color:black; font-size:9pt; }
    </style>

    <link rel="stylesheet" href="./styles/base.css">
    <link rel="stylesheet" href="./styles/tailer.css">
    <link rel="stylesheet" href="./styles/header.css">
    <style>
    .content_representImage_wrap { }
    .content_representImage_wrap img { margin-top: 100px; }

    .content_wrap { }

    .content_freeboard_wrap { width: 580px; background-color: #000000; margin-top: 50px; }
    .content_freeboard_top_wrap { height: 20px; background-color: #000000; }

    .content_freeboard_content_wrap { background-color: #2b2b2b; }
    .content_freeboard_content_num_wrap { }
    </style>

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

          <!-- 게시물 리스트를 보이기 위한 테이블 -->
          <table class="content_freeboard_wrap" border=0 cellpadding=2 cellspacing=1>
            <!-- 리스트 타이틀 부분 -->
            <tr class="content_freeboard_top_wrap">
              <td class="content_freeboard_top_num_wrap" width=30 align=center>
                <font color=white>번호</font>
              </td>
              <td class="content_freeboard_top_title_wrap" width=370 align=center>
                <font color=white>제 목</font>
              </td>
              <td class="content_freeboard_top_writer_wrap" width=50 align=center>
                <font color=white>글쓴이</font>
              </td>
              <td class="content_freeboard_top_date_wrap" width=60 align=center>
                <font color=white>날 짜</font>
              </td>
              <td class="content_freeboard_top_view_wrap" width=40 align=center>
                <font color=white>조회수</font>
              </td>
            </tr>
            <!-- 리스트 타이틀 끝 -->
            <!-- 리스트 부분 시작 -->
            <?php
              while($row=mysql_fetch_array($result))
              {
            ?>
            <!-- 행 시작 -->
            <tr class="content_freeboard_content_wrap">
              <!-- 번호 -->
              <td class="content_freeboard_content_num_wrap" align=center>
                <a href="freeboard_read.php?id=<?=$row['id']?>&no=<?=$no?>"><?=$row['id']?></a>
              </td>
              <!-- 번호 끝 -->
              <!-- 제목 -->
              <td class="content_freeboard_content_title_wrap">&nbsp;
                <?
                if ($row['depth'] > 0)
                {
                  echo "<img height=1 width=" . $row['depth']*7 . ">";
                }
                ?>
                <a href="freeboard_read.php?id=<?=$row['id']?>&no=<?=$no?>">
                <?=strip_tags($row['title']);?></a>
              </td>
              <!-- 제목 끝 -->
              <!-- 이름 -->
              <td align=center>
                <font color=black>
                  <a href="mailto:<?=row['email']?>"><?=$row['name']?></a>
                </font>
              </td>
              <!-- 이름 끝 -->
              <!-- 날짜 -->
              <td align=center>
                <font color=white><?= date("Y-m-d", strtotime($row['wdate'])) ?></font>
              </td>
              <!-- 날짜 끝 -->
              <!-- 조회수 -->
              <td align=center>
                <font color=white><?=$row['view']?></font>
              </td>
              <!-- 조회수 끝 -->
            </tr>
            <!-- 행 끝 -->
            <?php
              } // end while

              //데이터 베이스와 연결을 끝는다.
              mysql_close($conn);
            ?>
          </table>
          <!-- 게시물 리스트를 보이기 위한 테이블 끝 -->
          <!-- 페이지를 표시하기 위한 테이블 -->
          <table border=0>
            <tr>
              <td width=600 height=20 align=center rowspan=4>
                <font color=gray>
                  &nbsp;
                  <?php
                    $start_page=(int)($current_page / $page_list_size) * $page_list_size;

                    #페이지 리스트의 마지막 페이지가 몇 번째 페이지인지 구하는 부분이다.
                    $end_page = $start_page + $page_list_size - 1;

                    if ($total_page < $end_page) $end_page = $total_page;

                    if ($start_page >= $page_list_size) {
                      #이전 페이지 리스트값은 첫 번재 페이지에서 한 페이지 감소하면 된다.
                      #$page_size를 곱해주는 이유는 글 번호로 표시하기 위해서이다.

                      $prev_list = ($start_page - 1)*$page_size;
                      echo "<a href=\"$PHP_SELF?no=$prev_list\"></a>\n";
                    }

                    #페이지 리스트를 출력
                    for ($i=$start_page; $i <= $end_page; $i++) {
                      $page=$page_size* $i; //페이지값을 no 값으로 변환
                      $page_num = $i+1;

                      if ($no!=$page) { //현재 페이지가 아닐 경우만 링크를 표시
                        echo "<a href=\"$_SERVER[PHP_SELF]?no=$page\">";
                      }

                      echo " $page_num "; //페이지를 표시

                      if ($no!=$page) {
                        echo "</a>";
                      }
                    }

                    # 다음 페이지 리스트가 필요할때는 총 페이지가 마지막 리스트보다 클 때이다.
                    # 리스트를 다 뿌리고도 더 뿌려줄 페이지가 남았을 때 다음 버튼이 필요할 것이다.
                    if ($total_page > $end_page) {
                      $next_list = $end_page * $page_size;
                      echo "<a href=$PHP_SELF?no=$next_list></a><p>";
                    }
                  ?>
                </font>
              </td>
            </tr>
          </table>
          <a href="freeboard_write.php">글쓰기</a>
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
