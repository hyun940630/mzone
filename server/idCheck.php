<?
$db_host = "localhost";	// Mysql 데이터베이스를 가지고 있는 서버의 IP 할당.
$db_user = "root";

$db_password = "1234";
$db_name = "mzone";

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if(mysqli_connect_errno($conn)) {
  echo "데이터베이스 연결 실패: " . mysqli_connect_error();
}

$query = "select id from member";
$resource = mysqli_query($conn, $query, MYSQLI_USE_RESULT);

$idValue = $_GET['idValue'];
$exist_flag = false;

while($row = mysqli_fetch_object($resource)) {
  if($row->id == $idValue) {
    $exist_flag = true;
  }
}

if($exist_flag == true) {
  $response = "이미 사용중인 아이디 입니다.";
} else {
  $response = "사용 가능한 아이디 입니다.";
}

echo $response;
  //

  //
  //
  // echo ("<meta http-equiv='Refresh' content='0; url=../agreement.php'>");
?>
