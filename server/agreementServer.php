<!DOCTYPE html>
<html>
<head>
  <style>
    body { background-color: #000000; }
  </style>
</head>
<body>
</body>
</html>

<?
  $db_host = "localhost";	// Mysql 데이터베이스를 가지고 있는 서버의 IP 할당.
  $db_user = "root";

  $db_password = "1234";
  $db_name = "mzone";

  $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

  if(mysqli_connect_errno($conn)) {
    echo "데이터베이스 연결 실패: " . mysqli_connect_error();
  }

  // agreement.php 에서 얻어온 값들 이제 이 값들을 member DB에 INSERT 쿼리로 넣는다.
	$id = $_POST['id'];
  $password = $_POST['pw'];
  $name = $_POST['name'];
  $sex = $_POST['sex'];
  $email = $_POST['email'];
  $select_email = $_POST['select_email'];
  $tel = $_POST['tel'];
  $cardinalNum = $_POST['cardinalNumber'];

  echo $id . " " . $password . " " . $name . " " . $sex . " " . $email . " " . $select_email . " " . $tel . " " . $cardinalNum;

  //email의 앞의 아이디부분과 뒤의 주소부분을 합치는 과정.
  $email .= $select_email . "";

  //Mysql INSERT QUERY 작성.
	$query = "INSERT INTO member (id, password, name, sex, email, tel, cardialNum) VALUES ('". $id. "', '". $password. "', '". $name. "', '". $sex. "', '". $email. "', '". $tel. "', '". $cardinalNum. "');";

  mysqli_query($conn, $query, MYSQLI_USE_RESULT);
  mysqli_close($conn);

  echo "<script>alert(\"가입이 완료되었습니다.\")</script>";
  echo ("<meta http-equiv='Refresh' content='0; url=../home.php'>");
?>
