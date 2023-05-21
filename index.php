<?php
include_once 'assets/conn/connect.php';
// include_once 'assets/conn/server.php';
?>

<!-- login -->
<!-- check session -->
<?php
session_start();
// session_destroy();
if (isset($_SESSION['patientSession']) != "") {
header("Location: patient/patient.php");
}
if (isset($_POST['login']))
{
$icPatient = mysqli_real_escape_string($con,$_POST['icPatient']);
$password  = mysqli_real_escape_string($con,$_POST['password']);

$res = mysqli_query($con,"SELECT * FROM patient WHERE icPatient = '$icPatient'");
$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
if ($row['password'] == $password)
{
$_SESSION['patientSession'] = $row['icPatient'];
?>
<script type="text/javascript">
alert('Login Success');
</script>
<?php
header("Location: patient/patient.php");
} else {
?>
<script>
alert('wrong input ');
</script>
<?php
}
}
?>
<!-- register -->
<?php
if (isset($_POST['signup'])) {
$patientFirstName = mysqli_real_escape_string($con,$_POST['patientFirstName']);
$patientLastName  = mysqli_real_escape_string($con,$_POST['patientLastName']);
$patientEmail     = mysqli_real_escape_string($con,$_POST['patientEmail']);
$icPatient     = mysqli_real_escape_string($con,$_POST['icPatient']);
$password         = mysqli_real_escape_string($con,$_POST['password']);

$query = " INSERT INTO patient (  icPatient, password, patientFirstName, patientLastName, email )
VALUES ( '$icPatient', '$password', '$patientFirstName', '$patientLastName', '$patientEmail' ) ";
$result = mysqli_query($con, $query);
// echo $result;
if( $result )
{
?>
<script type="text/javascript">
alert('Register success. Please Login to make an appointment.');
</script>
<?php
}
else
{
?>
<script type="text/javascript">
alert('User already registered. Please try again');
</script>
<?php
}

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style1.css" rel="stylesheet">
        <link href="assets/css/blocks.css" rel="stylesheet">
        <link href="assets/css/date/bootstrap-datepicker.css" rel="stylesheet">
        <link href="assets/css/date/bootstrap-datepicker3.css" rel="stylesheet">
        <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
        <link href="assets/css/material.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">


    <title>Skio</title>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand nav_new " href="#">Skio</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    
                    
                    <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#services">Services</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#our app">Our App</a>
                  </li>

                        

                        <!-- <li><a href="adminlogin.php">Admin</a></li> -->
                        <li><a href="#" data-toggle="modal" data-target="#myModal">Sign Up</a></li>
                   
                        <li>
                            <p class="navbar-text">Already have an account?</p>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                            <ul id="login-dp" class="dropdown-menu">
                                <li>
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                            <form class="form" role="form" method="POST" accept-charset="UTF-8" >
                                                <div class="form-group">
                                                    <label class="sr-only" for="icPatient">Email</label>
                                                    <input type="text" class="form-control" name="icPatient" placeholder="icPatient" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only" for="password">Password</label>
                                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" name="login" id="login" class="btn btn-primary btn-block">Sign in</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- navigation -->


                <!-- modal container start -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- modal content -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">Sign Up</h3>
                    </div>
                    <!-- modal body start -->
                    <div class="modal-body">
                        
                        <!-- form start -->
                        <div class="container" id="wrap">
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <form action="<?php $_PHP_SELF ?>" method="POST" accept-charset="utf-8" class="form" role="form">
                                        <h4>It's free and always will be.</h4>
                                        <div class="row">
                                            <div class="col-xs-6 col-md-6">
                                                <input type="text" name="patientFirstName" value="" class="form-control input-lg" placeholder="First Name" required />
                                            </div>
                                            <div class="col-xs-6 col-md-6">
                                                <input type="text" name="patientLastName" value="" class="form-control input-lg" placeholder="Last Name" required />
                                            </div>
                                        </div>
                                        
                                        <input type="text" name="patientEmail" value="" class="form-control input-lg" placeholder="Your Email"  required/>
                                        <input type="number" name="icPatient" value="" class="form-control input-lg" placeholder="Your IC Number"  required/>
                                        
                                        
                                        <input type="password" name="password" value="" class="form-control input-lg" placeholder="Password"  required/>
                                        
                                        <input type="password" name="confirm_password" value="" class="form-control input-lg" placeholder="Confirm Password"  required/>

                                        <br />
                                        <span class="help-block">By clicking Create my account, you agree to our Terms and that you have read our Data Use Policy, including our Cookie Use.</span>
                                        
                                        <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit" name="signup" id="signup">Create my account</button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
        <!-- modal container end -->

  
         <!-- 1st section start -->
         <section id="promo-1" class="content-block  min-height-600px ">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <h2>Make appointment today!</h2>
                        <p>This is Doctor's Schedule. Please <span class="label label-danger">login</span> to make an appointment. </p>
                            
                        <!-- date textbox -->
                       
                        <div class="input-group" style="margin-bottom:10px;">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar">
                                </i>
                            </div>
                            <input class="form-control" id="date" name="date" value="<?php echo date("Y-m-d")?>" onchange="showUser(this.value)"/>
                        </div>
                       
                        <!-- date textbox end -->

                        <!-- script start -->
                        <script>

                            function showUser(str) {
                                
                                if (str == "") {
                                    document.getElementById("txtHint").innerHTML = "";
                                    return;
                                } else { 
                                    if (window.XMLHttpRequest) {
                                        // code for IE7+, Firefox, Chrome, Opera, Safari
                                        xmlhttp = new XMLHttpRequest();
                                    } else {
                                        // code for IE6, IE5
                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                    }
                                    xmlhttp.onreadystatechange = function() {
                                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                            document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                                        }
                                    };
                                    xmlhttp.open("GET","getuser.php?q="+str,true);
                                    console.log(str);
                                    xmlhttp.send();
                                }
                            }
                        </script>
                        
                        <!-- script start end -->
                     
                        <!-- table appointment start -->
                        <div id="txtHint"><b> </b></div>
                        
                        <!-- table appointment end -->
                    </div>

                </div>
            </div>
        </section>








   <!-- about us section-->
<div class="about pt-3" id="about">
  <div class="container">
    <div class="box text-center">
      <h1 class="fw-bold">
        About Us
      </h1>
    </div>
    <div class="main-title  mt-5 mb-5 position-relative">
      <div class="row     align-items-center">
        <div class="col-lg-8 col-md-12 col-sm-12 ml-5 pb-5" >
          <img src="image/about.jpg" alt="" style="border-radius: 10px;">
      
        </div>
        <div class="col-lg-4 text-center text-md-start mb-4 " >
          <h2>Our Clinic Is Made For You To Be Smiling All The Time</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi nam facilis in voluptas, quas obcaecati culpa consequatur ut, unde molestias officiis iste repellendus consequuntur sunt facere est iure nobis accusantium.</p>
      <br><br>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi nam facilis in voluptas, quas obcaecati culpa consequatur ut, unde molestias officiis iste repellendus consequuntur sunt facere est iure nobis accusantium.</p>
        </div>
      </div>
      
    </div>
  </div>
</div>

   <!-- about us section-->


   <!-- Services-->
   <div class="services text-center pt-5 pb-5" id="services">
    <div class="container pt-5 pb-5">
      <h1 class="fw-bold">OUR SERVICES</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore veniam atque aperiam vel?</p>

      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="box_sevice">
            <img src="" alt="" srcset="">
            <h3>Services</h3>
            <p>Lorem ipsum dolor sit amet consectetur.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="box_sevice">
            <img src="" alt="" srcset="">
            <h3>Services</h3>
            <p>Lorem ipsum dolor sit amet consectetur.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="box_sevice">
            <img src="" alt="" srcset="">
            <h3>Services</h3>
            <p>Lorem ipsum dolor sit amet consectetur.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="box_sevice">
            <img src="" alt="" srcset="">
            <h3>Services</h3>
            <p>Lorem ipsum dolor sit amet consectetur.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="box_sevice">
            <img src="" alt="" srcset="">
            <h3>Services</h3>
            <p>Lorem ipsum dolor sit amet consectetur.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="box_sevice">
            <img src="" alt="" srcset="">
            <h3>Services</h3>
            <p>Lorem ipsum dolor sit amet consectetur.</p>
          </div>
        </div>
      </div>


    </div>
   </div>
   <!-- Services-->


   <!-- Our APP-->
   <div class="app text-center pt-5 pb-5"id="our app">
    <div class="container">
      <h1 class="fw-bold" >Our APP</h1>
      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium.</p>
    </div>
    <div class="video_app">
      <div class="video">
        <video width="320" height="240" controls autoplay muted>
          <source src="image/video.mp4" type="video/mp4">
        </video>
        <div class="text">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, in?</p>
        </div>
        <div class="icons "  >
          <a href="#">
            <img src="image/google.png" alt="" srcset="" style="width: 210px; height: 200px;">

          </a>
          <a href="#">
            <img src="image/app store.jpg" alt="" srcset="" style="width: 200px;">

          </a>
        </div>
      </div>
      </div>

   </div>

   <!-- Our APP-->





   <!-- footer -->

   <div class="footer pb-5 pt-5 text-center">
    
    <div class="container">
    <div class="row">
      

        <div class="col-lg-3 pb-5 pt-5">
            <h3>address</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa ex placeat.</p>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
            </div>
        </div>

        <div class="col-lg-3 pb-5 pt-5">
            <h3>e-mail</h3>
            <a href="#" class="link">Skio4@gmail.com</a>
            <br>
            <a href="#" class="link">Skio@gmail.com</a>
        </div>

        <div class=" col-lg-3 pb-5 pt-5">
            <h3>call us</h3>
            <p>+61 (0) 3 2587 4569</p>
            <p>+61 (0) 3 2587 4569</p>
        </div>

        <div class="col-lg-3 pb-5 pt-5">
            <h3>opening hours</h3>
            <p>monday - friday : 8:00 - 24:00 <br>
               saturday : 9:00 - 24:00    
            </p>
        </div>
      </div>

    </div>
    <hr>
    <div class="">created by <span>Skio</span> | all rights reserved!</div>
    <hr>

  </div>






<!-- footer ends -->




 








 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 <script src="assets/js/jquery.js"></script>
    <script src="assets/js/date/bootstrap-datepicker.js"></script>
    <script src="assets/js/moment.js"></script>
    <script src="assets/js/transition.js"></script>
    <script src="assets/js/collapse.js"></script>
     <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').focus()
    })
    </script>
    <!-- date start -->
  
<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })

    })

</script>
    
</body>
</html>





  
