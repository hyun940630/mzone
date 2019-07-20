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
$query = "select id, subject, uploader, uploadDate, view, favorite, url from videoGallery";

//DB 전체를 불러온다.

//DB 레코드 개수를 센다.
$resource_count = mysql_query($query, $conn);
$resource = mysql_query($query, $conn);

//$count는 DB에서 업로드된 레코드의 수.
$count = mysql_num_rows($resource_count);

define ("PAGESIZE", 5);

// 영상을 뿌릴 때 페이지 별로 구분해서 로딩시간을 감소시킨다.
$page_no = 1;

?>

<html>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    
    <title></title>

    <link rel="stylesheet" href="./styles/base.css?ver=2">
    <link rel="stylesheet" href="./styles/header.css?ver=2">
    <link rel="stylesheet" href="./styles/videoGallery.css?ver=8">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!--  Header 관련 함수들.-->
    <script src="./scripts/header.js?ver=4"></script>

    <!--  videoGallery.js php연동을 하기위해서는 외부호출이 안됨.-->
    <script src="./scripts/videoGallery.js?ver=4"></script>
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

      <center>
      <div class="content_wrap">
        <!-- 대표 이미지 -->
        <div class="content_representImage_wrap">
          <img src="./images/logo.png" alt="">
        </div>

        <!--  베스트 비디오 -->
        <div class="content_bestVideo_wrap">
          <div class="content_bestVideo_title_wrap">
            <h4>BEST VIDEO</h4>
          </div>
          <div class="content_bestVideo_video_wrap">
            <video class="content_bestVideo_video_cell_wrap" id="bestVideo" src ="./gallery/video/practice.mp4" controls>
            </video>
          </div>
        </div>

        <!-- 갤러리 -->
        <div class="content_gallery_wrap">
          <div class="content_gallery_title_wrap">
            <h4>GALLERY</h4>
          </div>

          <div id="videoGallery" class="content_gallery_content_wrap">
            <!-- 동적할당을 해야하는 부분. -> videoGalleryInnerHTML() 참조 -->
            <?
              for($i=0; $i < $page_no * PAGESIZE; $i++) {
                  mysql_data_seek($resource, $i);
                  $row = mysql_fetch_array($resource);
            ?>
            <div class="content_gallery_content_cell_wrap">
              <video class="content_gallery_content_cell_thumbnail_wrap" id= "<?= $row['id'] ?>" controls>
                <source src="<?= $row['url'] ?>" type="video/mp4" />
              </video>
              <div class="content_gallery_content_cell_description_wrap">
                <div class="content_gallery_content_cell_description_title_wrap">
                  <h4> <?= $row['subject'] ?></h4>
                </div>
                <div class="content_gallery_content_cell_description_uploader_wrap">
                  <div class="content_gallery_content_cell_description_uploader_icon_wrap">
                    <h6></h6>
                  </div>
                  <div class="content_gallery_content_cell_description_uploader_content_wrap">
                    <h6> <?= $row['uploader'] ?> </h6>
                  </div>
                </div>
                <div class="includeUploadDateView">
                  <div class="content_gallery_content_cell_description_uploadDate_wrap">
                    <div class="content_gallery_content_cell_description_uploadDate_icon_wrap">
                      <img src="./images/videoGallery/date.png" alt="">
                    </div>
                    <div class="content_gallery_content_cell_description_uploadDate_content_wrap">
                      <h6> <?= $row['uploadDate'] ?></h6>
                    </div>
                  </div>
                  <div class="content_gallery_content_cell_description_view_wrap">
                    <div class="content_gallery_content_cell_description_view_icon_wrap">
                      <img class="content_gallery_content_cell_description_view_icon_img" src="./images/videoGallery/view.png" alt="">
                    </div>
                    <div class="content_gallery_content_cell_description_view_content_wrap">
                      <h6> <?= $row['view'] ?></h6>
                    </div>
                  </div>
                </div>
                <div class="content_gallery_content_cell_description_like_wrap">
                  <div class="content_gallery_content_cell_description_like_icon_wrap">
                    <a href="javascript:increaseLikeCount(<?= $row['id'] ?>);"><img class="content_gallery_content_cell_description_like_icon_img" src="./images/videoGallery/like.png" alt=""></a>
                  </div>
                  <div id="videoGalleryLike_<?= $row['id'] ?>" class="content_gallery_content_cell_description_like_content_wrap">
                    <h6> <?= $row['favorite'] ?> </h6>
                  </div>
                </div>
              </div>
            </div>
            <?
              } // END FOR...
            ?>
            <div class="content_gallery_content_moreLine_wrap">
              <hr />
              <h6>more</h6>
            </div>
          </div>
        </div>
      </div>
      </center>
      <div class="tailer_wrap">
      </div>
    </div>
  </body>
</html>
