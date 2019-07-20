<?
  error_reporting(E_ALL ^ E_DEPRECATED);

  $conn = mysql_connect("localhost", "root", "1234");
  mysql_select_db("mzone", $conn);

  $query = "INSERT INTO guestbook (name, pass, content) ";
  $query .= " VALUES ('$_POST[name]', '$_POST[pass]', '$_POST[content]')";
  $result = mysql_query($query, $conn);
?>

<script>
  alert("글이 등록되었습니다.");
  location.href = "guestBook.php";
</script>
