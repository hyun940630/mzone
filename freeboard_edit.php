<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>초 허접 게시판</title>
    <style>
      td { font-size:9pt; }
      A:link { font:9pt; color:black; text-decoration:none; font-family:굴림; font-size:9pt; }
      A:visited { text-decoration:none; color:black; gont-size:9pt; }
      A:hover { text-decoration:underline; color:black; font-size:9pt; }
    </style>
  </head>

  <body topmargin=0 leftmargin=0 text=#464646>
    <center>
      <br>
      <!-- 입력된 값을 다음 페이지로 넘기기 위해 FORM을 만든다. -->
      <form action=update.php?id=<?=$id?> method="post">
        <table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor=#777777>
          <tr>
            <td height=20 align=center bgcolor=#999999>
              <font color="white"><b>글 수 정 하 기</b></font>
            </td>
          </tr>
          <?php
            //데이터 베이스 연결하기
            include "db_info.php";

            //먼저 쓴 글의 정보를 가져온다.
            $result=mysql_query("SELECT * FROM freeboard WHERE id=$id", $conn);
            $row=mysql_fetch_array($result);
          ?>
          <!-- 입력부분 -->
          <tr>
            <td bgcolor=white>&nbsp;
              <table>
                <tr>
                  <td width=60 align=left>이름</td>
                  <td align=left>
                    <input type="text" name="name" size="20" value=<?=$row[name]?>>
                  </td>
                </tr>
                <tr>
                  <td width=60 align=left>이메일</td>
                  <td align=left>
                    <input type="text" name="email" size="20" value=<?=$row[email]?>>
                  </td>
                </tr>
                <tr>
                  <td width=60 align=left>비밀번호</td>
                  <td align=left>
                    <input type="password" name="pass" size="8">
                    (수정, 삭제시 반드시 필요)
                  </td>
                </tr>
                <tr>
                  <td width=60 align=left>제목</td>
                  <td align=left>
                    <input type="text" name="title" size="60" value=<?=$row[title]?>>
                  </td>
                </tr>
                <tr>
                  <td width="60" align=left>내용</td>
                  <td align=left>
                    <textarea name="content" rows="15" cols="65"><?=$row[content]?></textarea>
                  </td>
                </tr>
                <tr>
                  <td colspan=10 align=center>
                    <input type="submit" value="글 저장하기">
                    &nbsp; &nbsp;
                    <input type="reset" value="다시 쓰기">
                    &nbsp; &nbsp;
                    <input type="button" value="되돌아가기" onclick="history.back(-1)">
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </form>
    </center>
  </body>
</html>
