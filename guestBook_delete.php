<?php
  if($_GET[mode]!="delete")
  {
?>

<!DOCTYPE html>
<html>
  <form method="POST" action="<?=$_SERVER[PHP_SELF]?>?id=<?=$_GET[id]?>&mode=delete">
    <table>
      <tr>
        <td>비밀번호</td>
        <td><input type="password" name="pass"></td>
        <td><input type="submit" value="확인"></td>
      </tr>
    </table>
<?php
      exit;
    } //end if

    $conn = mysql_connect("localhost", "root", "gus940630");
    @mysql_select_db("mzone", $conn);
    @mysql_query("set names euckr");

    $query = "SELECT pass FROM guestbook WHERE id='$_GET[id]'";
    $result = mysql_query($query, $conn);
    $row = mysql_fetch_array($result);

    if($row[pass] == $_POST[pass])
    {
      $query = "DELETE FROM guestbook WHERE id='$_GET[id]'";
      $result = mysql_query($query, $conn);
    }
?>
<script>
  alert("글이 삭제되었습니다."); location.href="list.php";
</script>
  </form>
</html>
