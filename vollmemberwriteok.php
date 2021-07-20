 <?php

 
session_start();

   
 if($_GET['type'] !="del"){
 
 if($_SESSION['user']){
   
  $useremail = $_SESSION['user'];

  } else{

   echo '<meta http-equiv="refresh" content="0;url=../index.php?logout=1">';
 }





 
  
if(! $_GET['writer']) { 

   echo "<script> 

   window.alert('글쓴이을 입력해주세요~!'); 

    history.go(-1); 


   </script>"; 

   exit; 

 } 


 

if(! $_GET['username']) { 

   echo "<script> 

   window.alert('이름을 입력하세요~!'); 

    history.go(-1); 


   </script>"; 

   exit; 

 } 


if(! $_GET['usertel']) { 

   echo "<script> 

   window.alert('전화번호을 입력해주세요~!'); 

    history.go(-1); 


   </script>"; 

   exit; 

 } 


if(! $_GET['useracount']) { 

   echo "<script> 

   window.alert('구글계정을 입력하세요~!'); 

    history.go(-1); 


   </script>"; 

   exit; 

 } 
 }
 

  $host="localhost";                     //mysql의 경로 입니다.

 $dbid="chestedu";           //자신의 서버에서 DB에 접속하는 아이디를 입력하세요.  

 $dbpass="gt56305630";   //자신의 서버에서 DB에 접속하는 비밀번호를 입력하세요.

 $dbname="chestedu";        //자신의 서버에 만들어진 DB의 이름을 입력하세요.
 
 $useracount = $_GET['useracount']; 
 
 $username= $_GET['username'];
 $usertel = $_GET['usertel']; 

$usergrade = $_GET['usergrade'];
  
 $writer = $_GET['writer'];
 

$area1 = $_GET['area1'];
$area2 = $_GET['area2']; 



 $rs= new mysqli($host,$dbid,$dbpass);

mysqli_select_db($rs, $dbname) or die('DB 선택 실패');

 $rs->query("set names utf8"); 


 
if($rs->connect_error)
die("접속오류:".$rs->connect_error);

 

		 
  if($_GET['type'] == "modi"){
      
           
            $query5="update google_users set username = '$username', area1='$area1', area2='$area2', usertel = '$usertel', useracount = '$useracount', google_email='$useracount' where uid=$_GET[uid]";


    
  } else if($_GET['type'] == "del"){
             $uid = $_GET['uid'];
           
     
          $query5="delete from google_users where uid=$uid";
   
              
  } else{

    $modumchief2 = 0;
     $modumchief = 0;
     $jiwon = 0;
      $area2chief = 0;


   if($usergrade == "모둠장") {
       $modumchief = 1;
        $modumchief2 = 1;

     } else if($usergrade == "지회장 또는 지부장 또는 대표") {
       $area2chief = 1;
       $modumchief2 = 1;
     } else if($usergrade == "지회지원담당"){
       $jiwon = 1;
        $modumchief2 = 1;

     }
     
   
       
    
      $query5="insert into google_users (username, useracount, grade, modumchief, modumchief2, area2chief, jiwon, area1, area2, usertel, google_email) values  ('$username', '$useracount', 1, $modumchief, $modumchief2, $area2chief, $jiwon, '$area1', '$area2', '$usertel', '$useracount')";
         //  $query5="insert into google_users (username, useracount, grade, modumchief, modumchief2, area2chief, jiwon) values  ('$username', '$useracount', 1, $modumchief, $modumchief2, $area2chief, $jiwon)";

   }


	  $rr5=mysqli_query($rs, $query5);

       if(!$rr5) die("쿼리 실패 입니다1.".mysqli_error());
          
          

   

 
 

    
    


  ?>

                

		   <meta http-equiv="refresh" content="0; url=vollmember.php?area1=<? echo $area1; ?>&area2=<? echo $area2; ?>"></meta>
 
                   
	 
				
			 
	 	   	 
                 
                
	   	    	
		 
				 
		 