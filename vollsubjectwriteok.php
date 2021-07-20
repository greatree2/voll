 <?php

 
session_start();

   
 
 
 if($_SESSION['user']){
   
  $useremail = $_SESSION['user'];

  } else{

   echo '<meta http-equiv="refresh" content="0;url=../index.php?logout=1">';
 }




 if($_GET['type'] != "del"){
 if(! $_GET['subject']) { 

   echo "<script> 

   window.alert('제목을 입력해주세요~!'); 

    history.go(-1); 


   </script>"; 

   exit; 

 } 
 
  
if(! $_GET['writer']) { 

   echo "<script> 

   window.alert('글쓴이을 입력해주세요~!'); 

    history.go(-1); 


   </script>"; 

   exit; 

 } 



 if(! $_GET['pw']) { 

   echo "<script> 

   window.alert('비번를 입력해주세요~!'); 

    history.go(-1); 


   </script>"; 

   exit; 
 
 }

if(! $_GET['presentnum']) { 

   echo "<script> 

   window.alert('재적인원을 입력하세요~!'); 

    history.go(-1); 


   </script>"; 

   exit; 

 } 


if(! $_GET['starttime']) { 

   echo "<script> 

   window.alert('투표 시작 시간을 입력해주세요~!'); 

    history.go(-1); 


   </script>"; 

   exit; 

 } 


if(! $_GET['checktime']) { 

   echo "<script> 

   window.alert('출석체크 시간을 입력하세요~!'); 

    history.go(-1); 


   </script>"; 

   exit; 

 } 

 }

  $host="localhost";                     //mysql의 경로 입니다.

 $dbid="chestedu";           //자신의 서버에서 DB에 접속하는 아이디를 입력하세요.  

 $dbpass="gt56305630";   //자신의 서버에서 DB에 접속하는 비밀번호를 입력하세요.

 $dbname="chestedu";        //자신의 서버에 만들어진 DB의 이름을 입력하세요.
 
 $subject = $_GET['subject']; 
 
 $electorate= $_GET['electorate'];
 $meettype = $_GET['meettype'];

 

$checktime = $_GET['checktime'];
  
 $writer = $_GET['writer'];
 $pw = $_GET['pw'];
  
 $serial=$_GET['serial'];

$area1 = $_GET['area1'];
$area2 = $_GET['area2'];
$area3 = $_GET['area3'];  

$starttime = $_GET['starttime'];
$presentnum = $_GET['presentnum'];  

 $rs= new mysqli($host,$dbid,$dbpass);

mysqli_select_db($rs, $dbname) or die('DB 선택 실패');

 $rs->query("set names utf8"); 


 
if($rs->connect_error)
die("접속오류:".$rs->connect_error);

$sql ="SELECT * FROM vollsubject WHERE serial='$serial'";

  $result = mysqli_query($rs, $sql);

                if(!$result) die("쿼리 실패 입니다14.".mysqli_error());

             
              $row = $result->fetch_assoc();

		 
  if($_GET['type'] == "modi"){
      if($row['pw'] == $pw){
           
            $query5="update vollsubject set subject = '$subject', area1='$area1', area2='$area2', area3='$area3', electorate = '$electorate', meettype = '$meettype', starttime='$starttime', writer='$writer', checktime='$checktime', presentnum = $presentnum where serial=$serial";


     }else {
          echo "<script> 

   window.alert('비번을 확인하여 주세요~^^'); 

    history.go(-1); 


   </script>"; 

   exit; 

       }
     //  echo "<meta http-equiv='refresh' content='0; url=vollboardview.php?serial=.$serial.'></meta>"
  } else if($_GET['type'] == "del"){
     
      if($row['pw'] == $pw){
          $query5="update vollsubject set del = 1 where serial=$serial";
       } else {
          echo "<script> 

   window.alert('비번을 확인하여 주세요~^^'); 

    history.go(-1); 


   </script>"; 

   exit; 

       }
     // $query5="delete from vollboard where serial=$serial";
              
  } else{
    
       $query5="insert into vollsubject (subject, area1, area2, area3, electorate, meettype, writer, pw, writetime, starttime, checktime, active, presentnum, admin) values  ('$subject', '$area1', '$area2', '$area3','$electorate', '$meettype', '$writer', '$pw', now(), '$starttime', $checktime, 0, $presentnum, '$useremail') ";
         
   }


	  $rr5=mysqli_query($rs, $query5);

       if(!$rr5) die("쿼리 실패 입니다1.".mysqli_error());
          
           if(!$serial){
           $serial = mysqli_insert_id($rs);
              }
        

   //  printf("Last inserted record has id %d\n", mysqli_insert_id($rs));


 
    

    
    


  ?>

 

		 

			<div class="login">
			 
				
			<?  if($_GET['type'] == "del"){ ?>		  
			 <meta http-equiv="refresh" content="0; url=vollsubjectboard.php"></meta>	
		
		<? } else { ?>		
	 	   <meta http-equiv='refresh' content='0; url=vollsubjectview.php?serial=<? echo $serial; ?>'></meta> 	 
                 
                
		<? } ?>		     
				    	
		 
				 
		 