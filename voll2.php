<?

session_start();

  $host="localhost";                     //mysql의 경로 입니다.

 $dbid="chestedu";           //자신의 서버에서 DB에 접속하는 아이디를 입력하세요.  

 $dbpass="gt56305630";   //자신의 서버에서 DB에 접속하는 비밀번호를 입력하세요.

 $dbname="chestedu";        //자신의 서버에 만들어진 DB의 이름을 입력하세요.

  
 
 if($_SESSION['user']){
   
  $useremail = $_SESSION['user'];

  } else{

   echo '<meta http-equiv="refresh" content="0;url=../index.php?logout=1">';
 }
 
 

    $db= new mysqli($host,$dbid,$dbpass,$dbname);

  
	mysqli_select_db($db, $dbname) or die('DB 선택 실패');
 
   $db->query("set names utf8"); 
 
 
  if($db->connect_error)
   die("접속오류:".$db->connect_error);
 
   $originserial = $_GET['originserial'];

 
            
	   
   $query5="select * from vollboard where originserial = $originserial && active > 0"; 

   $rr5=mysqli_query($db, $query5);

   if(!$rr5) die("쿼리 실패 입니다111.".mysqli_error());

     $row2 = mysqli_fetch_array($rr5);
      
    $rownum22 = mysqli_num_rows($rr5);
 
    $serial = $row2['serial'];



    $query55="select * from vollsubject where serial = $originserial"; 

   $rr55=mysqli_query($db, $query55);

   if(!$rr55) die("쿼리 실패 입니다112.".mysqli_error());

     $row55 = mysqli_fetch_array($rr55);  



        
       if($rownum22 > 0) {
            $active = $row2['active'];

          $sql11 ="SELECT * FROM vollpractice WHERE useremail='$useremail' && originserial = $serial && active = $active";

             $rr11=mysqli_query($db, $sql11);
             
          if(!$rr11) die("쿼리 실패 입니다22.".mysqli_error());
           
       
           $rownum11= mysqli_num_rows($rr11);
            
        //  $active = $active + 1;

        }

          
	$sql ="SELECT * FROM google_users WHERE google_email='$useremail'";
            
	 $result = mysqli_query($db, $sql);

                if(!$result) die("쿼리 실패 입니다14.".mysqli_error());

               $rownum= mysqli_num_rows($result);
              $row = $result->fetch_assoc();
          //  echo "aaa";

         //     echo $rownum;
          //   echo $row['google_name'];
               
          


?>




<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>선거사이트</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/jungto34.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
      
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="../assets/img/jungto34.png" class="navbar-brand-img" alt="..."> 투표소        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
                          <? if($row['grade'] < 2){ ?>
       
             <li to="/" tag="li" class="nav-item" >             
                   
                     <a   class="sidebar-menu-item nav-link active" data-toggle="collapse" data-target="#collapseTwo"  >
                      <i class="ni ni-single-02 text-yellow">                        
                      </i>
                       <span class="nav-link-text" >
                          선거
                      <b class="caret"></b>
                       </span>                      
                  </a>
                         
               <div id="collapseTwo" class="collapse show" aria-labelledby="headingOne" >                       
                       <ul class="nav nav-sm flex-column ">
                            <li class="nav-item"> 
                              <a href="voll.php" class="nav-link active" aria-current="page">
                                    <span class="nav-link-text">투표</span>
                              </a>
                            </li>
                           <? if($row['volladmin'] == 1){ ?>
                          <li class="nav-item"> 
                                  <a href="vollsubjectboard.php" class="nav-link">
                                    <span class="nav-link-text">관리</span>
                                  </a>
                             </li>
                       
                       
                           <? } ?>
                           </ul>  
                   </div>                      
              </li>    
                 <? } ?>
           
            <li class="nav-item">
              <a class="nav-link active" href="../index.php?logout=1">
                <i class="ni ni-user-run text-orange"></i>
                <span class="nav-link-text">Logout</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-success border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <div class="media-body  ml-1  d-none d-lg-block">
                    <h7 class="h2 text-white d-inline-block mb-0"> </h7>
                   
                  </div>
          
          <!-- Search form 
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form> -->
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
           
            <li class="nav-item dropdown">
              <!--
             <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
               -->
              <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
                </div>
                <!-- List group -->
                <div class="list-group list-group-flush">
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>3 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>5 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="../assets/img/theme/team-5.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>3 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                      </div>
                    </div>
                  </a>
                </div>
                <!-- View all -->
                <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
              </div>
            </li>
            <li class="nav-item dropdown">
               <!--
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-ungroup"></i>
              </a>
               -->
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                <div class="row shortcuts px-4">
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                      <i class="ni ni-calendar-grid-58"></i>
                    </span>
                    <small>Calendar</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                      <i class="ni ni-email-83"></i>
                    </span>
                    <small>Email</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                      <i class="ni ni-credit-card"></i>
                    </span>
                    <small>Payments</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                      <i class="ni ni-books"></i>
                    </span>
                    <small>Reports</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                      <i class="ni ni-pin-3"></i>
                    </span>
                    <small>Maps</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                      <i class="ni ni-basket"></i>
                    </span>
                    <small>Shop</small>
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="<? echo $row['google_picture_link']; ?>">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><? echo $row['google_name']; ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <!--
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Settings</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Activity</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Support</span>
                </a>
                 -->
                <div class="dropdown-divider"></div>
                <a href="../index.php?logout=1" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout </span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-success pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
             <!--
             <div class="card-body">
               
            
               <h3><font color="white">
                  </font></h3>     
         
            </div>
           
               -->     
            

           
          </div>
         <!--
         <div class="card-body">
                        <div class="alert alert-success">
                             <a class="dropdown-item" href="https://sites.google.com/jungto.org/jeonbeop" target="_blank">
                          <span><b><center>전법활동가 교육사이트(매주 업데이트)</center> </b></span></a>
                        </div>
                        <div class="alert alert-warning">
                            <a class="dropdown-item" href="https://meet.google.com/fze-qrmv-uio" target="_blank">
                       
                          <span><b><center> 전법활동가 법회(주, 저 공용) 참가 주소줄</center>  </b></span> </a>
                        </div>
                        
                        
                      </div>
          -->
          <!-- Card stats -->
          
        </div>
      </div>
    </div>
    <!-- Page content -->
   
    <div class="container-fluid mt--6">
       <div class="row">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-header border-0">
              <div class="row ">
                <div class="col">
                  <h3 class="mb-0"><? if($row55['meettype'] =="의결회의" ) { if($row2['subject']) { echo $row2['active']; echo "차";  } }  echo " 투표";?></h3>
                </div>
                 
               </div>
              </div>
            <div class="col">
              <!-- Projects table -->
               <? if($rownum11 > 0) { ?>
                       <div class="form-group">
                 <div class="input-group">
                  
                     <? if($row2 ['active2'] == 2){  ?>
                           <b>   <span class="mb-0" id="basic-addon1"> 아직 투표 할깨 없습니다. 화상안내에 따라주세요~^^ <br></span></b>
                     <? } else { ?>



                    <b>   <span class="mb-0" id="basic-addon1"> 이미 투표하였습니다.</span></b>

                   
                    <? } ?>
   
                     
                 </div>
                    <center>
                                   <? // if($rownum22 ['active'] ==4){ echo aa;?>
                                                  <!--         <button type="button" class="btn btn-outline-primary" onclick = "location.href = './voll3.php?active=<? echo $_GET['active']; ?>&serial=<? echo $_GET['serial']; ?>&originserial=<? echo $_GET['originserial']; ?>'">돌아가기 </button>
                                                   -->
                                                      <?// } else { ?> 
                     <br>  <button type="button" class="btn btn-outline-primary" onclick = "location.href = './voll3.php?active=<? echo $active; ?>&serial=<? echo $serial; ?>&originserial=<? echo $_GET['originserial']; ?>'">돌아가기 </button>
                       <? // echo aa; } ?> 
                            </center>
                 </div>

               <? } else { ?>
               <form name="order" action="voll3.php" method="get">
                  <input type="hidden" name="serial"  value="<? echo $row2['serial']; ?>">
                  <input type="hidden" name="originserial"  value="<? echo $originserial; ?>">

                   <input type="hidden" name="active"  value="<? echo $row2['active']; ?>">
                   
                   <? if($row2['subject']) { ?>  
                   <div class="form-group">
                 <div class="input-group">
                  
                    <b>   <span class="mb-0" id="basic-addon1">안&nbsp;&nbsp;&nbsp;&nbsp;건 : <?php echo $row2['subject']; ?></span></b>
                      
                     
                 </div>
                 </div>
                   <div class="col-md-6">
                   <div class="custom-control custom-radio mb-3">
                        <input name="custom-radio-1" class="custom-control-input" id="customRadio5" type="radio" value="1">
                        <label class="custom-control-label" for="customRadio5"><?php echo $row2['item1']; ?></label>
                      </div>
                      <div class="custom-control custom-radio mb-3">
                        <input name="custom-radio-1" class="custom-control-input" id="customRadio6"  type="radio" value="2">
                        <label class="custom-control-label" for="customRadio6"><?php echo $row2['item2']; ?></label>
                      </div>
                   <? } else {?>
                  <div class="form-group">
                   <div class="input-group">
                  
                    <b>   <span class="mb-0" id="basic-addon1">아직 투표할게 없습니다. 화상 안내에 따르세요.</span></b>
             

                     
                   </div>

                       <br><br><br>
                                 <center>
              <? if($_GET['type'] == 1) { ?>
                  <button type="button" class="btn btn-outline-primary" onclick = "location.href = './voll17.php?originserial=<? echo $_GET['originserial']; ?>'">돌아가기 </button>
              <? } else { ?> 
              <button type="button" class="btn btn-outline-primary" onclick = "location.href = './voll3.php?active=<? echo $_GET['active']; ?>&serial=<? echo $_GET['serial']; ?>&originserial=<? echo $_GET['originserial']; ?>'">돌아가기 </button>

              <? } ?>
                </center>
                    </div>


                   <? } ?>
                      <? if($row2['item3']) { ?>
                      <div class="custom-control custom-radio mb-3">
                         <input name="custom-radio-1" class="custom-control-input" id="customRadio7"  type="radio" value="3">
                        <label class="custom-control-label" for="customRadio7"><?php echo $row2['item3']; ?></label>
                      </div>
                      <? }  if($row2['item4']) {?>
                      <div class="custom-control custom-radio mb-3">
                       <input name="custom-radio-1" class="custom-control-input" id="customRadio8"  type="radio" value="4">
                        <label class="custom-control-label" for="customRadio8"><?php echo $row2['item4']; ?></label>
                      </div>
                         <? }  if($row2['item5']) {?>
                       <div class="custom-control custom-radio mb-3">
                       <input name="custom-radio-1" class="custom-control-input" id="customRadio9"  type="radio" value="5">
                        <label class="custom-control-label" for="customRadio9"><?php echo $row2['item5']; ?></label>
                      </div>
                         <? } ?>
                    </div>

                       <? if($row2['subject']) { ?>  

                   <center><button class="btn btn-outline-warning" type="submit" class="order" name="wp-submit" id="wp-submit"  value="작성완료" >투표</button></center>
	                <? } ?>
                 
               		</form>
                     



                     <br>
               </div>
                




                  <br>  
          
                    <? } ?>




                                                
			</div>
                  
         

                 
            </div>
          </div>
        </div>

   
                 
               
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>