<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>수행법회</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<!--<link rel="stylesheet" href="assets/css/main.css" />-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
<style>

		.login {

			background:#fff;

			width:420px;

			margin: 10px auto ;			

			padding:10px;

			border:1px solid #e5e5e5;

			-moz-box-shadow: rgba(200,200,200,.7) 0 4px 10px -1px;

			-webkit-box-shadow: rgba(200,200,200,.7) 0 4px 10px -1px;

			box-shadow: rgba(200,200,200,.7) 0 4px 10px -1px;

		}

		.login h1 a {

			background-image:url(images/logo.png);

			background-repeat:no-repeat;

			background-position:center top;

			background-size:189px 47px;

			height:47px;

			margin:0 auto 25px;

			padding:0;

			width:189px;

			text-indent:-9999px;

			overflow:hidden;

			display:block;

		}

		.login h1 a { width:100%;}

		.login form {

			margin:0px auto;

			border:none;						

			margin-top:20px;

			padding:10px;

		}
		

	</style> 

    <style>
      a {
         text-decoration:none;
		}
     </style>
 

 

	</head>



	<body>
 <?php

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
 }

 $host="localhost";                     //mysql의 경로 입니다.

 $dbid="chestedu";           //자신의 서버에서 DB에 접속하는 아이디를 입력하세요.  

 $dbpass="gt56305630";   //자신의 서버에서 DB에 접속하는 비밀번호를 입력하세요.

 $dbname="chestedu";        //자신의 서버에 만들어진 DB의 이름을 입력하세요.
 
 $subject = $_GET['subject']; 
 
 $electrator= $_GET['electrator'];


  
 $writer = $_GET['writer'];
 $pw = $_GET['pw'];
  
$serial = $_GET['serial'];

$item1 = $_GET['item1'];
$item2 = $_GET['item2'];
$item3 = $_GET['item3']; 
$item4 = $_GET['item4'];
$item5 = $_GET['item5']; 

$originserial = $_GET['originserial']; 

 $rs= new mysqli($host,$dbid,$dbpass);

mysqli_select_db($rs, $dbname) or die('DB 선택 실패');

 $rs->query("set names utf8"); 


 
if($rs->connect_error)
die("접속오류:".$rs->connect_error);

$sql ="SELECT * FROM vollboard  WHERE serial='$serial'";

  $result = mysqli_query($rs, $sql);

                if(!$result) die("쿼리 실패 입니다14.".mysqli_error());

             
              $row = $result->fetch_assoc();

		 
  if($_GET['type'] == "modi"){
      if($row['pw'] == $pw){
          $query5="update vollboard set subject = '$subject', item1='$_GET[item1]', item2='$_GET[item2]', item3='$_GET[item3]', item4='$_GET[item4]', item5='$_GET[item5]',  writer='$writer' where serial=$serial";
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
          $query5="update vollboard set del = 1 where serial=$serial";
       } else {
          echo "<script> 

   window.alert('비번을 확인하여 주세요~^^'); 

    history.go(-1); 


   </script>"; 

   exit; 

       }
     // $query5="delete from vollboard where serial=$serial";
              
  } else{
    
       $query5="insert into vollboard (originserial, subject, item1, item2, item3, item4, item5, writer, pw, writetime) values  ($originserial, '$subject', '$item1', '$item2', '$item3', '$item4','$item5', '$writer', '$pw', now())";
  }


	  $rr5=mysqli_query($rs, $query5);

       if(!$rr5) die("쿼리 실패 입니다1.".mysqli_error());


   //  printf("Last inserted record has id %d\n", mysqli_insert_id($rs));


 
    

    
    


  ?>

 

		 

			<div class="login">
			 
				
				  
				
				
				 
                  <meta http-equiv="refresh" content="0; url=vollsubjectview.php?serial=<? echo $originserial; ?>"></meta>
 
				    	
		 
				 
		

			</div>

		 
 
 
  

	</body>
</html>