<?
$db_host = "localhost";	// Mysql 데이터베이스를 가지고 있는 서버의 IP 할당.
$db_user = "root";

$db_password = "1234";
$db_name = "mzone";

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if(mysqli_connect_errno($conn)) {
  echo "데이터베이스 연결 실패: " . mysqli_connect_error();
}

// videoGallery.php 에서 넘어온 값.

$galleryId = $_GET['galleryId'];

// 좋아요 버튼을 한번 눌러서 +1시킴 DB 측면에서는 수정된 내용을 반영 하는 쿼리
$updateQuery = "UPDATE videoGallery SET favorite=favorite+1 WHERE id='$galleryId'";
mysqli_query($conn, $updateQuery, MYSQLI_USE_RESULT);

// 수정된 내용을 다시 videoGallery.php에 뿌려주기 위해서 SELECT 쿼리 사용.
$selectQuery = "SELECT favorite FROM videoGallery WHERE id='$galleryId'";
$resource = mysqli_query($conn, $selectQuery, MYSQLI_USE_RESULT);

$row = mysqli_fetch_object($resource);

$response = $row->favorite;
echo $response;
?>
