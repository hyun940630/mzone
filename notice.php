<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    
    <title></title>

    <link rel="stylesheet" href="./styles/base.css">
    <link rel="stylesheet" href="./styles/header.css">
    <link rel="stylesheet" href="./styles/notice.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="./scripts/header.js"></script>

  </head>
  <body>
    <div class="total_wrap">
      <center>
      <!-- HEADER -->
      <div class="header_wrap">
        <!--  홈 버튼 생성 영역-->
        <div class="header_left_wrap">
          <div class="header_left_logo_wrap">
              <a href="./home.php"><img src="./images/header/home.png" alt="홈 로고"></a>
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
            <div class="header_right_userForm_login_wrap">
              <a href=""><img src="" alt="로그인"></a>
            </div>
            <div class="header_right_userForm_join_wrap">
              <a href="./agreement.php"><img src="" alt="회원가입"></a>
            </div>
          </div>
        </div>
      </div>
      </center>

      <div class="content_wrap">
        <center>
          <!-- sub_image -->
          <img class="subimg" src="http://localhost/p1/sub_img.png" alt="sub_image">
          <!-- notice part -->
          <table class="sub_news" border="1" cellspacing="0" summary="게시판의 글제목 리스트">
            <colgroup>
              <col>
              <col width="110">
              <col width="100">
              <col width="80">
            </colgroup>
            <thead>
              <tr>
                <th scope="col" style="width:3%;">번호</th>
                <th scope="col" style="width:50%;">제목</th>
                <th scope="col" style="width:4%;">글쓴이</th>
                <th scope="col" style="width:4%;">날짜</th>
                <th scope="col" style="width:3%;">조회수</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="count"> 게시글의 번호 </td>
                <td class="title">
                  <a href="#######">게시판 제목이 들어갑니다.</a>
                  <img  class="pic" width="13" height="12" alt="첨부이미지" src="첨부파일/ic_pic.gif">
                  <a class="comment" href="#">[1]</a>
                  <img class="new" width="10" height="9" src="첨부파일/ic_new.gif" alt="새글">
                </td>
                <td class="name">글쓴이이름</td>
                <td class="date">2000-01-01</td>
                <td class="hit">1</td>
              </tr>
              <tr class="reply">
                <td class="count"></td>
                <td class="title" style="padding-left:30px;">
                  <a href="#######">블로그 개편 답글</a>
                </td>
                <td class="name">프로젝트팀</td>
                <td class="date">2017-03-01</td>
                <td class="hit">1</td>
              </tr>
              <!-- tr이 제목 1줄. 보일 list 갯수만큼 li반복. -->
            </tbody>
          </table>
          <!-- notic part over! -->
        </center>
      </div>
      <div class="tailer_wrap">
      </div>
    </div>
  </body>
</html>
