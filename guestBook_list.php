<?
  $conn = mysql_connect("localhost", "root", "1234");
  mysql_select_db("mzone", $conn);
  mysql_query("set names euckr");

  $query = "SELECT * FROM guestbook ORDER BY id DESC";
  $result = mysql_query($query, $conn);
  $total = mysql_affected_rows();

  $pagesize = 5;
?>

<form action="guestBook_insert.php" method="post">
  <table>
    <tr>
      <td>이름</td><td><input type="text" name="name"></td>
      <td>비밀번호</td><td><input type="password" name="pass"></td>
    </tr>
    <tr>
      <td colspan="4">
        <textarea name="content" rows=5 cols=80></textarea>
      </td>
    </tr>
    <tr>
      <td colspan=4 align=right><input type="submit" value="확인"></td>
    </tr>
  </table>
</form>
<br>

<?
  for($i=$_GET['no']; $i < $_GET['no'] + $pagesize; $i++) {
    if($i < $total) {
      mysql_data_seek($result, $i);
      $row = mysql_fetch_array($result);
?>
<table width=600 border=1>
  <tr>
    <td>No. <?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td>(<?= $row['wdate']?>)</td>
    <td><a href="delete.php?id=<?=$row['id']?>">del</a></td>
  </tr>
  <tr>
    <td colspan=4><?=$row['content']?></td>
  </tr>
</table>
<?
    }
  }

  $prev = $_GET['no'] - $pagesize;
  $next = $_GET['no'] + $pagesize;

  if ($prev >= 0) {
    echo ("<a href='$_SERVER[PHP_SELF]?no=$prev'>이전</a> ");
  }
  if ($next < $total) {
    echo ("<a href='$_SERVER[PHP_SELF]?no=$next'>다음</a>");
  }
?>
