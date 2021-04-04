<?php
// base_url = http://localhost/Board/public

namespace App\Controllers;
use CodeIgniter\Controller;

class Join extends Controller
{
    // 메인화면
    public function index()
    {
        echo 'welcome.'.'<br>';
        echo '<a href="join">회원가입 링크</a>';
    }
    
    // 회원가입폼
    public function join()
    {
        echo view('layout/header');
        echo view('member/join');
        echo view('layout/footer');
    }

    public function process()
    {
        $json = $_POST['data'];
        $data = json_decode($json); 
        $id = $data->memberId;
        $pswd = $data->pswd;
        $name = $data->memberName;


        $serverName = "localhost";
        $connectionOptions = array(
            "database" => "JAMES_DB", // 데이터베이스명
            "uid" => "james",   // 유저 아이디
            "pwd" => "1111"    // 유저 비번
        );
        $dbconn = sqlsrv_connect($serverName, $connectionOptions); 

        $query = "insert into member values('$id','$pswd','$name','c','d')"; 
        echo($query);

        sqlsrv_query($dbconn, $query);  // 쿼리를 실행하여 statement 를 얻어온다
        // $stmt = sqlsrv_query($dbconn, $query);  // 쿼리를 실행하여 statement 를 얻어온다
        
        // while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) // statement 를 돌면서 필드값을 가져온다
        // {
        //     echo $row['id'];
        //     echo $row['name'];
        //     echo "<br>";
        // } 

        // sqlsrv_free_stmt($stmt); // 데이터 출력후 statement 를 해제한다
        sqlsrv_close($dbconn); // 데이터베이스 접속을 해제한다

        return true;
    }




    
    // public function view($page)
    // {
    //     if ( ! is_file(APPPATH.'Views/member/'.$page.'.php'))
    //     {
    //         echo APPPATH.'Views/member'.$page.'.php';
    //         throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
    //     }
    //     $data['title'] = ucfirst($page); // Capitalize the first letter
    //     echo view('layout/header', $data);
    //     echo view('member/'.$page, $data);
    //     echo view('layout/footer', $data);
    // }
}

?>