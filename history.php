<?
// 쿠키를 통해 로그인 여부 확인하고 로그인 시만 서비스를 이용할 수 있게.
if(empty($_COOKIE['login_id'])) {
  echo "<script>alert(\"로그인이 필요한 서비스입니다.\")</script>";
  echo ("<meta http-equiv='Refresh' content='0; url=./home.php'>");

  return;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    
    <title>M-ZONE :: 엠존역사</title>

    <link rel="stylesheet" href="./styles/base.css">
    <link rel="stylesheet" href="./styles/header.css">
    <link rel="stylesheet" href="./styles/tailer.css">
    <style>
    .total_wrap { position: absolute; width: 100%; height: 6400px; border: solid 0px #aaaaaa; }
    .content_wrap { width: 50%; height: 6200px; border: solid 0px #aaaaaa;  top: 60px; left: 25%; }
    .content_representImage_wrap { width: 100%; height: 250px; border: solid 0px #aaaaaa; margin-top: 110px; }
    .content_history_wrap { width: 100%; height: 5850px; border: solid 0px #aaaaaa; margin-top: 20px; }
    .content_historyTitle_wrap { width: 100%; height: 50px; border-bottom: solid 1px #ffffff; }
    .content_historyTitle_wrap h4 { float: left; color: #ffffff; }
    .content_history_wrap { color: #ffffff; }
    th { border: 1px solid white; padding: 15px; }
    td { border-right: 1px solid white; border-bottom: 1px dashed white; padding: 10px; text-align: center;}
    tr { border: 1px dashed white; }
    table { width: 100%; border: 1px solid white; border-collapse: collapse; }

    </style>
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
        <div class="content_representImage_wrap">
          <img src="./images/logo.png" alt="">
        </div>
        <div class="content_historyTitle_wrap">
          <h4>HISTORY</h4>
        </div>
        <div class="content_history_wrap">
          <!--<img src="" width="100%" height="100%" alt="역사이미지">-->
          <table id="history_table">
            <thead>
              <tr><th>기수</th><th>이름</th><th>연락처</th></tr>
            </thead>
            <tbody>
              <tr><td rowspan="5">1기</td><td>정용필 (보컬)</td><td>018-625-2512</td></tr>
              <tr><td>강병옥 (드럼)</td><td>011-9644-0636</td></tr>
              <tr><td>서현수 (기타)</td><td></td></tr>
              <tr><td>고남규 (베이스)</td><td></td></tr>
              <tr><td>이재상</td><td></td></tr>
              <tr><td rowspan="6">2기</td><td>장충석 (기타)</td><td>019-678-3265</td></tr>
              <tr><td>이재훈 (보컬)</td><td></td></tr>
              <tr><td>이지하 (베이스)</td><td></td></tr>
              <tr><td>김수미 (키보드)</td><td></td></tr>
              <tr><td>유형욱 (드럼)</td><td></td></tr>
              <tr><td>오현주</td><td></td></tr>
              <tr><td rowspan="6">3기</td><td>서완석 (기타)</td><td>017-677-9769</td></tr>
              <tr><td>남궁효일 (드럼)</td><td></td></tr>
              <tr><td>한성우 (보컬)</td><td></td></tr>
              <tr><td>박병건 (보컬)</td><td></td></tr>
              <tr><td>백홍석 (베이스)</td><td></td></tr>
              <tr><td>윤수이 (키보드)</td><td></td></tr>
              <tr><td rowspan="7">4기</td><td>조운배</td><td></td></tr>
              <tr><td>이중남</td><td></td></tr>
              <tr><td>류동옥</td><td>010-3312-1363</td></tr>
              <tr><td>이승학</td><td></td></tr>
              <tr><td>박기원</td><td>010-6679-9000</td></tr>
              <tr><td>채미경</td><td></td></tr>
              <tr><td>조미령 (키보드)</td><td></td></tr>
              <tr><td rowspan="3">5기</td><td>김호영</td><td></td></tr>
              <tr><td>이인재 (베이스)</td><td>02-2235-2753</td></tr>
              <tr><td>안남석 (기타)</td><td>019-262-4168</td></tr>
              <tr><td rowspan="5">8기<br>-M-ZONE 개명-</td><td>용해득 (베이스)</td><td>010-6257-1409</td></tr>
              <tr><td>김기형 (기타)</td><td>016 -769-8770</td></tr>
              <tr><td>최준호 (드럼)</td><td>010-3900-6807</td></tr>
              <tr><td>이춘석</td><td>011-9668-8877</td></tr>
              <tr><td>권순일 (보컬)</td><td>010-9132-6213</td></tr>
              <tr><td rowspan="3">9기</td><td>이재승 (베이스)</td><td>010-7544-9376</td></tr>
              <tr><td>김성권 (기타)</td><td>010-5119-7852</td></tr>
              <tr><td>김원호 (기타)</td><td>019-479-0051</td></tr>
              <tr><td rowspan="6">10기</td><td>김 규 (보컬)</td><td>016-619-7859</td></tr>
              <tr><td>양광은 (드럼)</td><td>010-3044-4260</td></tr>
              <tr><td>조운관 (베이스)</td><td>010-2685-5631</td></tr>
              <tr><td>송재걸</td><td></td></tr>
              <tr><td>문정진</td><td></td></tr>
              <tr><td>손승현</td><td>011-617-2398</td></tr>
              <tr><td rowspan="5">11기</td><td>이승현 (베이스)</td><td>016-652-8867</td></tr>
              <tr><td>전병웅 (기타)</td><td>019-301-5231</td></tr>
              <tr><td>이내화 (기타)</td><td>010-8905-4492</td></tr>
              <tr><td>박성용 (보컬)</td><td>016-732-9773</td></tr>
              <tr><td>조정식 (보컬)</td><td>011-676-3956</td></tr>
              <tr><td rowspan="5">12기</td><td>박인희 (기타)</td><td>010-9942-7060</td></tr>
              <tr><td>권기호 (보컬)</td><td></td></tr>
              <tr><td>우종승 (기타)</td><td>010-8775-6206</td></tr>
              <tr><td>이태경 (드럼)</td><td>016-675-1215</td></tr>
              <tr><td>유선화 (베이스)</td><td>016-624-0756</td></tr>
              <tr><td rowspan="7">13기</td><td>위 남 (베이스)</td><td>미국-512-567-4830<br>010-3358-7907</td></tr>
              <tr><td>박수진 (키보드)</td><td>010-8640-9922</td></tr>
              <tr><td>채현식 (기타)</td><td>010-2655-7407</td></tr>
              <tr><td>이경수 (기타)</td><td>010-2249-4306</td></tr>
              <tr><td>강슬기 (보컬)</td><td>019-611-8927</td></tr>
              <tr><td>서인석 (보컬)</td><td>018-731-1239</td></tr>
              <tr><td>윤지호 (기타)</td><td>017-600-8131</td></tr>
              <tr><td rowspan="6">14기<br>-남자 밴드-</td><td>하승용 (베이스)</td><td>010-3493-0850</td></tr>
              <tr><td>장 욱 (보컬)</td><td>011-600-8724</td></tr>
              <tr><td>조원성 (기타)</td><td>010-5277-8220</td></tr>
              <tr><td>최동규 (드럼)</td><td>011-9970-4407</td></tr>
              <tr><td>홍의식 (기타)</td><td>010-6667-6746</td></tr>
              <tr><td>고민정 (키보드)</td><td>010-9544-1524</td></tr>
              <tr><td rowspan="6">14기<br>-여자 밴드-</td><td>서윤진 (드럼)</td><td>011-9640-3330</td></tr>
              <tr><td>황지영 (보컬)</td><td>011-9436-3158</td></tr>
              <tr><td>전은재 (보컬)</td><td>010-2339-1494</td></tr>
              <tr><td>윤현경 (키보드)</td><td>011-9428-6341</td></tr>
              <tr><td>조민희 (기타)</td><td>010-6636-6746</td></tr>
              <tr><td>이민재 (기타)</td><td>011-9641-6235</td></tr>
              <tr><td rowspan="11">15기</td><td>조영규 (보컬)</td><td>010-6367-6935</td></tr>
              <tr><td>김범정 (기타)</td><td>010-4023-8538</td></tr>
              <tr><td>이후선 (기타)</td><td>010-6474-7917</td></tr>
              <tr><td>봉성근 (드럼)</td><td>010-9798-3392</td></tr>
              <tr><td>최대환 (드럼)</td><td>010-6430-9118</td></tr>
              <tr><td>서광진 (베이스)</td><td>010-5133-7546</td></tr>
              <tr><td>노유나 (기타)</td><td>016-658-4346</td></tr>
              <tr><td>설영경 (베이스)</td><td>011-447-2159</td></tr>
              <tr><td>육은정 (드럼)</td><td>010-2946-9395</td></tr>
              <tr><td>정다운 (드럼)</td><td>011-9754-9503</td></tr>
              <tr><td>최하나 (보컬)</td><td></td></tr>
              <tr><td rowspan="7">16기</td><td>공욱군 (드럼)</td><td>010-9755-5902</td></tr>
              <tr><td>김정환 (기타)</td><td>010-4320-5751</td></tr>
              <tr><td>이재성 (베이스)</td><td>010-2084-2219</td></tr>
              <tr><td>이숙희 (기타)</td><td>010-5549-6542</td></tr>
              <tr><td>홍은경 (보컬)</td><td>011-9438-2516</td></tr>
              <tr><td>황제현 (베이스)</td><td>016-9877-7810</td></tr>
              <tr><td>홍기현 (보컬)</td><td>010-8273-0317</td></tr>
              <tr><td rowspan="8">17기</td><td>박정민 (기타)</td><td>010-9059-1229</td></tr>
              <tr><td>조 건 (기타)</td><td>010-4208-5789</td></tr>
              <tr><td>문일수</td><td>016-446-5904</td></tr>
              <tr><td>정동혁 (베이스)</td><td>017-279-6912</td></tr>
              <tr><td>정미희 (드럼)</td><td>018-611-0173</td></tr>
              <tr><td>서현실 (보컬)</td><td>019-9770-5869</td></tr>
              <tr><td>김혜원 (보컬)</td><td>019-9472-0809</td></tr>
              <tr><td>김현중 (보컬)</td><td>010-5532-3539</td></tr>
              <tr><td rowspan="6">18기</td><td>한상혁 (기타)</td><td>010-7550-3538</td></tr>
              <tr><td>김민규 (기타)</td><td>010-4458-6484</td></tr>
              <tr><td>정유진 (베이스)</td><td>010-9270-1632</td></tr>
              <tr><td>김성제 (드럼)</td><td>010-3077-9476</td></tr>
              <tr><td>한광희 (보컬)</td><td>010-7707-3332</td></tr>
              <tr><td>조정민</td><td>010-9095-9697</td></tr>
              <tr><td rowspan="7">19기</td><td>심상준 (보컬)</td><td>010-8741-9078</td></tr>
              <tr><td>김성태 (기타)</td><td>010-4768-5396</td></tr>
              <tr><td>강태규 (기타)</td><td>010-7409-0500</td></tr>
              <tr><td>홍순웅 (드럼)</td><td>010-8608-7853</td></tr>
              <tr><td>박기호 (베이스)</td><td>010-6826-0619</td></tr>
              <tr><td>윤미연 (보컬)</td><td>010-4115-3219</td></tr>
              <tr><td>한혜림 (기타)</td><td>010-3783-2979</td></tr>
              <tr><td rowspan="3">20기</td><td>손혜란 (베이스)</td><td>010-7618-2214</td></tr>
              <tr><td>김태현 (기타)</td><td>010-2508-3733</td></tr>
              <tr><td>최병진 (드럼)</td><td>010-5553-6963</td></tr>
              <tr><td rowspan="4">21기</td><td>이현정 (보컬)</td><td>010-9653-9989 </td></tr>
              <tr><td>황정민 (기타)</td><td>010-9518-1548</td></tr>
              <tr><td>이수현 (베이스)</td><td>010-9525-5852</td></tr>
              <tr><td>박장우 (드럼)</td><td>010-6320-5912</td></tr>
              <tr><td rowspan="4">22기</td><td>김태준 (기타)</td><td>010-2955-5450</td></tr>
              <tr><td>김광진 (기타)</td><td>010-9651-8200</td></tr>
              <tr><td>김용기 (기타)</td><td>010-4828-2812</td></tr>
              <tr><td>박진형 (베이스)</td><td>010-8619-4541</td></tr>
              <tr><td rowspan="2">23기</td><td>김민재 (드럼)</td><td>010-9906-6332</td></tr>
              <tr><td>김우연 (보컬)</td><td>010-3042-2642</td></tr>
              <tr><td rowspan="2">24기</td><td>최재욱 (보컬)</td><td>010-5377-7906</td></tr>
              <tr><td>김혜진 (드럼)</td><td>010-2629-3100</td></tr>
              <tr><td rowspan="1">25기</td><td>조중모 (보컬)</td><td></td></tr>
              <tr><td rowspan="2">26기</td><td>김재은 (보컬)</td><td></td></tr>
              <tr><td>유미진 (베이스)</td><td></td></tr>
              <tr><td rowspan="3">27기</td><td>황 현 (기타)</td><td>010-7467-9632</td></tr>
              <tr><td>차인식 (베이스)</td><td></td></tr>
              <tr><td>윤기동 (드럼)</td><td>010-6750-3708</td></tr>
              <tr><td rowspan="2">29기</td><td>박요환 (기타)</td><td>010-9629-1995</td></tr>
              <tr><td>김재형 (드럼)</td><td>010-2642-5504</td></tr>
              <tr><td rowspan="5">30기</td><td>김희아 (베이스)</td><td>010-4464-8891</td></tr>
              <tr><td>김서영 (기타)</td><td>010-7733-8942</td></tr>
              <tr><td>조다연 (드럼)</td><td>010-2289-0991</td></tr>
              <tr><td>김원제 (기타)</td><td>010-3575-0156</td></tr>
              <tr><td>윤혜인 (보컬)</td><td>010-2461-7465</td></tr>
            </tbody>
          </table>
        </div>
      </div>
    </center>
      <div class="tailer_wrap">
        <center>
        <h5>Copyright(c)2017 M-Zone All rights reserved.<br>
          Designed by Hwang-Yun-Kim<br>
          Jeonbuk Iksan Sindong 272, Wonkwang Univ.</h5>
        </center>
        <img id="tailer_banner" src="./images/tailer/banner.png" alt="테일러배너">
        <a href="http://cafe.naver.com/wkgsmzone" target="_blank"><img id="naver_banner_img" src="./images/tailer/naver.png" onmouseout="this.src='./images/tailer/naver.png'" onmouseover="this.src='./images/tailer/naver_hover.png'" alt="네이버 링크" /></a>
        <a href="https://www.facebook.com/groups/198402046955657/?ref=bookmarks" target="_blank"><img id="facebook_banner_img" src="./images/tailer/facebook.png" onmouseout="this.src='./images/tailer/facebook.png'" onmouseover="this.src='./images/tailer/facebook_hover.png'" alt="페이스북 링크" /></a>
        <a href="" target="_blank"><img id="cyworld_banner_img" src="./images/tailer/cyworld.png" onmouseout="this.src='./images/tailer/cyworld.png'" onmouseover="this.src='./images/tailer/cyworld_hover.png'" alt="싸이월드 링크" /></a>
      </div>
    </div>
  </body>
</html>
