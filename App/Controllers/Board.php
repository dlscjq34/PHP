<?php
// base_url = http://localhost/Board/public

namespace App\Controllers;
use CodeIgniter\Controller;


class Board extends Controller
{
    // 게시판 컨트롤러
    public function board()
    {
        $contents = $this->selectAll();
        $bonus = "I'm bonus.";
        $data = array('contents'=>$contents, 'bonus'=>$bonus);
        echo view('layout/header', $data);
        echo view('board/board');
        echo view('layout/footer');
    }

    // 게시글폼 컨트롤러
    public function write()
    {
        echo view('layout/header');
        echo view('board/write');
        echo view('layout/footer');
    } 

    // 게시글 쓰기 컨트롤러
    public function process()
    {
        $json = $_POST['data'];
        $data = json_decode($json); 
        $query = "insert into board(title, content) values('$data->title','$data->content')"; 
        $this->insert($query);
    }

    // 게시글 리스트 읽어오기 DB 작업
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

    // 게시글 쓰기 DB 작업
    public function insert($_query)
    {
        $dbconn = $this->dbConn();
        $query = $_query;
        $stmt = sqlsrv_query($dbconn, $query);  // 쿼리를 실행하여 statement 를 얻어온다
        $result = (string)$stmt;
        $this->dbClose($stmt, $dbconn);
        return $result;
    }

    // DB 접속
    public function dbConn()
    {
        $serverName = "localhost";
        $connectionOptions = array(
            "database" => "JAMES_DB", // 데이터베이스명
            "uid" => "james",   // 유저 아이디
            "pwd" => "1111"    // 유저 비번
        );
        $dbConn = sqlsrv_connect($serverName, $connectionOptions); 
        return $dbConn;
    }

    // DB 접속 해제
    public function dbClose($stmt, $dbconn)
    {
        sqlsrv_free_stmt($stmt); // 데이터 출력후 statement 를 해제한다
        sqlsrv_close($dbconn); // 데이터베이스 접속을 해제한다
    }



    // public function dbConn($_query)
    // {
    //     $serverName = "localhost";
    //     $connectionOptions = array(
    //         "database" => "JAMES_DB", // 데이터베이스명
    //         "uid" => "james",   // 유저 아이디
    //         "pwd" => "1111"    // 유저 비번
    //     );
    //     $dbconn = sqlsrv_connect($serverName, $connectionOptions); 
    //     $query = $_query;
    //     $stmt = sqlsrv_query($dbconn, $query);  // 쿼리를 실행하여 statement 를 얻어온다
    //     $result = (string)$stmt;
    //     // while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) // statement 를 돌면서 필드값을 가져온다
    //     // {
    //     //     echo $row['id'];
    //     //     echo $row['name'];
    //     //     echo "<br>";
    //     // } 
    //     sqlsrv_free_stmt($stmt); // 데이터 출력후 statement 를 해제한다
    //     sqlsrv_close($dbconn); // 데이터베이스 접속을 해제한다
    //     echo $result;
    //     return $result;
    // }


    
}

?>