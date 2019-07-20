<!DOCTYPE html>

<?
// 쿠키를 통해 로그인 여부 확인하고 로그인 시만 서비스를 이용할 수 있게.
if(empty($_COOKIE['login_id'])) {
  echo "<script>alert(\"로그인이 필요한 서비스입니다.\")</script>";
  echo ("<meta http-equiv='Refresh' content='0; url=./home.php'>");

  return;
}

error_reporting(E_ALL ^ E_DEPRECATED);

//우선 php로 mysql 데이터베이스 안에 들어있는 videoGallery 데이터를 가져온다.
$conn = mysql_connect("localhost", "root", "1234");
mysql_select_db("mzone", $conn);

if(mysqli_connect_errno($conn)) {
  echo "데이터베이스 연결 실패: " . mysqli_connect_error();
}

//videoGallery DB를 읽어 오는 SELECT 쿼리 생성
$query = "select id, url from photogallery";

//DB 전체를 불러온다.

//DB 레코드 개수를 센다.
$resource_count = mysql_query($query, $conn);
$resource = mysql_query($query, $conn);

//$count는 DB에서 업로드된 레코드의 수.
$count = mysql_num_rows($resource_count);
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    
    <title>엠존 밴드동아리 :: 사진갤러리</title>

    <link rel="stylesheet" href="./styles/base.css">
    <link rel="stylesheet" href="./styles/header.css?ver=2">
    <link rel="stylesheet" href="./styles/photoGallery.css?ver=7">
    <link rel="stylesheet" href="./colorbox/colorbox.css">

    <style media="screen">
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="./colorbox/jquery.colorbox.js"></script>
    <script src="./scripts/header.js?ver=4"></script>
    <script>
      $(document).ready(function () {
        $('a[rel="lightbox"]').colorbox({
          height: 700
        });
      });
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
        </center>

        <!--  갤러리 -->
        <div class="content_gallery_wrap">
          <div class="content_gallery_title_wrap">
            <h4>GALLERY</h4>
          </div>

          <!-- 포토 갤러리 -->
          <div id="photoGallery" class="content_gallery_content_wrap">
            <div id="multiRight" class="content_gallery_content_multi_wrap">
              <?
                for($i=0; $i < $count; $i++) {
                    mysql_data_seek($resource, $i);
                    $row = mysql_fetch_array($resource);

                    if($i%3 == 0) {
              ?>
              <ul>
                <li class="content_gallery_content_multi_cell_wrap">
                  <div class="content_gallery_content_multi_cell_thumbnail_wrap">
                    <a rel="lightbox" href="<?= $row['url'] ?>"><img src="<?= $row['url'] ?>"></a>
                  </div>
                </il>
              </ul>
              <?
                    }
                }
              ?>
            </div>
            <div id="multiCenter" class="content_gallery_content_multi_wrap">
              <?
                for($i=0; $i < $count; $i++) {
                    mysql_data_seek($resource, $i);
                    $row = mysql_fetch_array($resource);

                    if($i%3 == 1) {
              ?>
              <ul>
                <li class="content_gallery_content_multi_cell_wrap">
                  <div class="content_gallery_content_multi_cell_thumbnail_wrap">
                    <a rel="lightbox" href="<?= $row['url'] ?>"><img src="<?= $row['url']?>"></a>
                  </div>
                </il>
              </ul
              <?
                    }
                }
              ?>>
            </div>
            <div id="multiLeft" class="content_gallery_content_multi_wrap">
              <?
                for($i=0; $i < $count; $i++) {
                    mysql_data_seek($resource, $i);
                    $row = mysql_fetch_array($resource);

                    if($i%3 == 2) {
              ?>
              <ul>
                <li class="content_gallery_content_multi_cell_wrap">
                  <div class="content_gallery_content_multi_cell_thumbnail_wrap">
                    <a rel="lightbox" href="<?= $row['url'] ?>"><img src="<?= $row['url']?>"></a>
                  </div>
                </il>
              </ul>
              <?
                    }
                }
              ?>

            </div>
          </div>
        </div>
      </div>
      <div class="tailer_wrap">
      </div>
    </div>
    </center>
  </body>
</html>
