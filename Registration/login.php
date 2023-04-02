<?php
/**authenticating and checking whether user have registered
 * if the user did not registered it will check and prompt the user that
 * the user is not found.
 */
require 'config.php';

if(isset($_POST["submit"])){
    $usernameemail =$_POST["usernameemail"];
    $password =$_POST["password"];
    $result = mysqli_query($conn, "SELECT *FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_array($result);
    if($row["usertype"] == "user")
    {
        $_SESSION["username"] =$usernameemail;
        header("Location: ../client/client.html");
    }
    elseif ($row["usertype"] == "admin")
    {
        $_SESSION["username"] =$usernameemail;
        header("Location: ../admin/admin.html");
    }
    else
    {
        echo "User Not Registered";
    }
}
?>

<html lang="en">
<head>
<title>Decorlion</title>
    <link rel="icon" href="Resources/img/favicon.ico" type="image/x-icon" />
    <link href="Resources/css/all-css.css" rel="stylesheet" type="text/css">
    <link href="Resources/css/set1.css" rel="stylesheet" type="text/css">
    <link href="Resources/css/one-page.css" rel="stylesheet" type="text/css">
    <link href="Resources/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .n {
            background: url(Resources/img/contact-bg.jpg) no-repeat bottom;
        }
        input[type=text],input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        color:black;
        }

        button {
            border: 2px solid #fecb38;
            color: #fff;
            letter-spacing: 1px;
            line-height: normal;
            padding: 14px 30px;
            text-transform: uppercase;
            font-weight: 800;
            background: none!important;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        button:hover {
            border: 2px solid #fecb38;
            background:#fecb38!important;
            color:#000!important;
        }

        .reg {
        width: auto;
        padding: 10px 18px;
        background-color: #337ab7;
        }

        .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
        }

        img.avatar {
        width: 100px;
        border-radius: 100px;
        }

        .container {
        padding-left: 15px;
        padding-right: 15px;
        }
        .container input{
            width:30% ;
        }
        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {

        .reg {
            width: 100%;
        }
        }
        .collapse .nav li a:hover{
            color:yellow;
        } 
    </style>
</head>
<body id="page-top">
    <div id="preloader"></div>
    <!-- Starting of navbar-->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand page-scroll" href="#page-top"><img src="Resources/img/logo.jpg" alt="logo" title="" style="height: 50px; width: 50px;"/></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li> <a class="page-scroll" href="../index.html">Guest Page</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--log in-->
    <main class="n">
    <section class="what-we" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <h2 class="wow fadeInDown" style="color:white">Login</h2>
                </div>
            </div>
        </div>

        <form action="" method="POST" autocomplete="off">
           <div class="imgcontainer">
              <img src="Resources/img/avatar.png" alt="Avatar" class="avatar">
            </div>
            <div class="container">
               <label for="usernameemail"><b>Username or Email</b></label> <br>
               <input type="text" placeholder="Enter Username" id="usernameemail" name="usernameemail" required> <br>

               <label for="password"><b>Password</b></label> <br>
               <input type="password" id="password" placeholder="Enter Password" name="password" required> <br>
                                                                                                                
               <button type="submit" name="submit">Login</button>

               <button class="reg" type="button"><a href="signup.php" style= "color:white">Signup Now</a></button>
            </div>
        </form>
    </section>
</main>
<footer>
        <!--footer-div-->
        <div class="footer">
            <div class="container">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Decorlion 2023</span>
                </div>
                <div class="col-md-4  col-sm-4 footer-c text-right">
                    <div class="social-icons"><a href="#"><i class="fa fa-facebook fa-lg"></i></a><a href="#"><i class="fa fa-twitter fa-lg"></i></a><a href="#"><i class="fa fa-rss fa-lg"></i></a><a href="#"><i class="fa fa-google-plus fa-lg"></i></a><a href="#"><i class="fa fa-skype fa-lg"></i></a><a href="#"><i class="fa fa-dribbble fa-lg"></i></a></div>
                </div>
            </div>
        </div>
        <!--footer-div-->
    </footer>
   
</body>

</html>

<!-- jQuery -->
<script src="Resources/js/jquery-2.2.4.js"></script>
<script src="Resources/js/scrolltopcontrol.js"></script>
<script src="Resources/js/bootstrap.min.js"></script>
<script src="Resources/js/jquery.easing.min.js"></script>
<script src="Resources/js/creative.min.js"></script>
<!-- jQuery -->