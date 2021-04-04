<?php
	echo $bonus;
?>
<a href="Board/public/write">글쓰기</a>

<table border="1">
	<thead>
		<tr align="center">
			<th>글번호</th> 
			<th>작성자</th>
			<th>제목</th>
			<th>작성일</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	foreach ($contents as $row) {
	?>
		<tr align="center"> 
			<td><?=  $row['id'] ?></td>
			<td><?=  $row['title'] ?></td>
			<td><?=  $row['content'] ?></td>
			<td><?= date_format($row['regdate'], 'yy/m/d H:i:s') ?></td>
		</tr>
	<?php 
	}
	?>
	</tbody>
</table>
<br>


<?
public function selectAll()
    {
        $dbconn =  $this->dbConn();
        $query = "select * from board order by id desc";
        $stmt = sqlsrv_query($dbconn, $query);  // 쿼리를 실행하여 statement 를 얻어온다
        $contents = array();
        $i = 0;
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) // statement 를 돌면서 필드값을 가져온다
        {
            $contents[$i]['id'] = $row['id'];
            $contents[$i]['title'] = $row['title'];
            $contents[$i]['content'] = $row['content'];
            $contents[$i]['regdate'] = $row['regdate'];
            $i++;
        }
        $this->dbClose($stmt, $dbconn);
        return $contents;
    }
?>