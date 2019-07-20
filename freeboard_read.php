<?php

  error_reporting(E_ALL ^ E_DEPRECATED);

  //데이터 베이스 연결하기
  include "freeboard_db_info.php";
  $id=$_GET['id'];
  $no=$_GET['no'];

  //조회수 없데이트
  $query = "UPDATE $board SET view=view+1 WHERE id=$id";
  $result=mysql_query($query, $conn);

  //글 정보 가져오기
  $query = "SELECT * FROM $board WHERE id=$id";
  $result=mysql_query($query, $conn);
  $row=mysql_fetch_array($result);
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

        <div class="freeboardRead_wrap">
          <center>
            <br>
            <table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor=#777777>
              <tr>
                <td height=20 colspan=4 align=center bgcolor=#999999>
                  <font color=white><b><?=$row['title']?></b></font>
                </td>
              </tr>
              <tr>
                <td width=50 height=20 align=center bgcolor=#EEEEEE>글쓴이</td>
                <td width=240 bgcolor=white><?=$row['name']?></td>
                <td width=50 align=center bgcolor=#EEEEEE>이메일</td>
                <td width=240 bgcolor=white><?=$row['email']?></td>
              </tr>
              <tr>
                <td width=50 height=20 align=center bgcolor=#EEEEEE>날&nbsp;&nbsp;&nbsp;짜</td>
                <td width=240 bgcolor=white><?=date("Y-m-d"), $row['wdate']?></td>
                <td width=50 height=20 align=center bgcolor=#EEEEEE>조회수</td>
                <td width=240 bgcolor=white><?=$row['view']?></td>
              </tr>
              <tr>
                <td bgcolor=white colspan=4 style="word-break:break-all;">
                  <font color=black>
                    <pre><?=strip_tags($row['content']);?></pre>
                  </font>
                </td>
              </tr>
              <!-- 기타 버튼 틀 -->
              <tr>
                <td colspan=4 bgcolor=#999999>
                  <table width=100%>
                    <tr>
                      <td width=280 align=left height=20>
                        <a href="freeboard_list.php?no=<?=$no?>"><font color=white>[목록보기]</font></a>
                        <a href="freeboard_reply.php?id=<?=$id?>"><font color=white>[답글달기]</font></a>
                        <a href="freeboard_write.php"><font color=white>글쓰기</font></a>
                        <a href="freeboard_edit.php?id=<?$id?>"><font color=white>[수정]</font></a>
                        <a href="freeboard_predel.php?id=<?=$id?>"><font color=white>[삭제]</font></a>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>

            <table width=580 bgcolor=white style="boarder-bottom-width:1;
            boarder-bottom-style:solid; boarder-bottom-color:cccccc;">
            <?php
              //현재 글보다 thread 값이 큰 클 중 가장 작은 것의 id를 가져온다.
              $query = "SELECT id, name, title, FROM $board WHERE thread > $row[thread] LIMIT 1";
              $result = mysql_query($query, $conn);
              $up_id = mysql_fetch_array($result);

              if($up_id['id']) //이전 글이 있을 경우
              {
                echo "<tr><td width=500 align=left height=25></td></tr>";
                echo "<a href=read.php?id=$up_id[id]> $up_id[title]</a></td><td align=right>$up_id[name]</td></tr>";
              }

              //현재 글보다 thread 값이 작은 글 중 가장 큰 것의 id를 가져온다.
              $query = "SELECT id, name, title FROM $board WHERE thread <$row[thread] ORDER BY thread DESC LIMIT 1";
              $result=mysql_query($query, $conn);
              $down_id=mysql_fetch_array($result);

              if($down_id['id'])
              {
                echo "<tr><td width=500 align=left height=25></td></tr>";
                echo "<a href=freeboard_read.php?id=$down_id[id]> $down_id[title]</a></td><td align=right>$down_id[name]</td></tr>";
              }
            ?>
            </table>
            <br>
            <?php
            //리스트 출력을 위해 thread를 계산한다.

            $thread_end = ceil($row['thread']/1000)*1000;
            $thread_start = $thread_end - 1000;

            $query = "SELECT * FROM $board WHERE thread <= $thread_end and thread > $thread_start ORDER BY thread DESC";
            $result = mysql_query($query, $conn);
            ?>

            <!-- 게시물 리스트를 보이기 위한 테이블 -->
            <table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor=#777777>
            <!-- 리스트 타이틀 부분 -->
              <tr height=20 bgcolor=#999999>
                <td width=30 align=center>
                  <font color=white>번호</font>
                </td>
                <td width=370 align=center>
                  <font color=white>제 목</font>
                </td>
                <td width=50 align=center>
                  <font color=white>글쓴이</font>
                </td>
                <td width=60 align=center>
                  <font color=white>날 짜</font>
                </td>
                <td width=40 align=center>
                  <font color=white>조회수</font>
                </td>
              </tr>

              <?php
                while($row=mysql_fetch_array($result))
                {
              ?>
              <!-- 행 시작 -->
              <tr>
              <!-- 번호 -->
                <td height=20 bgcolor=white align=center>
                  <a href="freeboard_read.php?id=<?=$row['id']?>&no=<?=$no?>">
                    <?=$row['id']?></a>
                </td>

                <td height=20 bgcolor=white>&nbsp;
                  <?php //depth 값을 통해서 들여쓰기를 한다. 투명 이미지의 가로 사이즈를 늘이는 방법
                  if($row['depth'] > 0)
                  {
                    echo "<img src=img/dot.gif height=1 width=" . $row['depth']*7 . ">->";
                  }
                  ?>
                  <a href="freeboard_read.php?id=<?=$row['id']?>&no=<?=$no?>"><?=strip_tags($row['title'], '<b><i>');?></a>
                </td>

                <td align=center height=20 bgcolor=white>
                  <font color=black>
                    <a href="mailto:<?=$row['email']?>"><?=$row['name']?></a>
                  </font>
                </td>
                <td align=center height=20 bgcolor=white>
                  <font color=black><?=date("Y-m-d", strtotime($row['wdate']))?></font>
                </td>
                <td align=center height=20 bgcolor=white>
                  <font color=black><?=$row['view']?></font>
                </td>
              </tr>
              <?php
            } //end while
            mysql_close($conn);
              ?>
            </table>
          </center>
        </div>
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
