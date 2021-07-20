<?php

 $host="localhost";                     //mysql의 경로 입니다.

 $dbid="chestedu";           //자신의 서버에서 DB에 접속하는 아이디를 입력하세요.  

 $dbpass="gt56305630";   //자신의 서버에서 DB에 접속하는 비밀번호를 입력하세요.

 $dbname="chestedu";        //자신의 서버에 만들어진 DB의 이름을 입력하세요.
 
   $area1 = $_GET['area1'];

	if($db->connect_error) {

		die('데이터베이스 연결에 문제가 있습니다.\n관리자에게 문의 바랍니다.');

	}


	$rs= new mysqli($host,$dbid,$dbpass);

    mysqli_select_db($rs, $dbname) or die('DB 선택 실패');

     $rs->query("set names utf8"); 


 
       if($rs->connect_error)
       die("접속오류:".$rs->connect_error); 

                        $query66="select * from jungto where area1 = '$area1' group by area2";
      
                      $rr66=mysqli_query($rs, $query66);
        
                      if(!$rr66) die("쿼리 실패 입니다1.".mysqli_error());
                            $rownum11= mysqli_num_rows($rr66);

  
			 $output = '';
                         
                        // $output =  "<option>$row36['area2']</option>";

			 
			 			 

                       while($row36 = mysqli_fetch_array($rr66)){

                         $output .=  "<option>".$row36['area2']."</option>";

                       }  

						 echo $output;
						 
		

 mysqli_close($rs);  
 ?>


 