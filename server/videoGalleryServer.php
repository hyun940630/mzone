<?
$db_host = "localhost";	// Mysql 데이터베이스를 가지고 있는 서버의 IP 할당.
$db_user = "root";

$db_password = "1234";
$db_name = "mzone";

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if(mysqli_connect_errno($conn)) {
  echo "데이터베이스 연결 실패: " . mysqli_connect_error();
}

$uploader;
$uploadDate;
$view;
$like;
$url;

$query = "select uploader, uploadDate, view, like, url from videoGallery";
$resource = mysqli_query($conn, $query, MYSQLI_USE_RESULT);

while($row = mysqli_fetch_object($resource)) {
  echo $row->uploader. "  ";
  echo $row->uploadDate. "  ";
  echo $row->view. "  ";
  echo $row->like. "  ";
  echo $row->url. "  ";
}
?>
