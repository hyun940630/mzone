<?
  $db_host = "localhost";	// Mysql 데이터베이스를 가지고 있는 서버의 IP 할당.
  $db_user = "root";

  $db_password = "1234";
  $db_name = "mzone";

  $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

  if(mysqli_connect_errno($conn)) {
    echo "데이터베이스 연결 실패: " . mysqli_connect_error();
  }

  $id = $_POST['login_id'];
  $pw = $_POST['login_pw'];

  // echo $id . " " . $pw;

  $query = "select id, password from member";

  $resource = mysqli_query($conn, $query, MYSQLI_USE_RESULT);

  $result = false;

  while($row = mysqli_fetch_object($resource)) {
    // echo $row->id. "  ";
    // echo $row->password;

    if($row->id == $id) {
      if($row->password == $pw) {
        $result = true;
        setcookie("login_id", $_POST['login_id'], 0, "/");
        break;
      }
    }
  }

  if($result == false) {
    echo "<script>alert(\"입력하신 로그인, 비밀번호가 맞지 않습니다.\")</script>";
  }
  echo ("<meta http-equiv='Refresh' content='0; url=../home.php'>");
?>
