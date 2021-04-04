<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Welcome to CodeIgniter 4!</title>
	
	hello<hr>

<?php 
$serverName = "localhost";
$connectionOptions = array(
    "database" => "JAMES_DB", // 데이터베이스명
    "uid" => "james",   // 유저 아이디
    "pwd" => "1111"    // 유저 비번
);

$dbconn = sqlsrv_connect($serverName, $connectionOptions); 

// 쿼리
$query = "SELECT * FROM james_table"; 

// 쿼리를 실행하여 statement 를 얻어온다
$stmt = sqlsrv_query($dbconn, $query);

// statement 를 돌면서 필드값을 가져온다
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
{
    echo $row['id'];
    echo $row['name'];
    echo "<br>";
}

// 데이터 출력후 statement 를 해제한다
sqlsrv_free_stmt($stmt);

// 데이터베이스 접속을 해제한다
sqlsrv_close($dbconn);

?>

</body>
</html>

