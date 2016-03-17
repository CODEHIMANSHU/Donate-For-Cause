<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--for title icon-->
    <link rel="shortcut icon" href="img/title.ico" />
    <title>
      Donate For Cause
    </title>
  </head>
  <body background="img/world.png" class="grey darken-1 white-text">
    <!-- Dropdown Structure for login-->
    <ul id="d1" class="dropdown-content" style="padding:10px 10px 10px 10px;">
      <li>      
      <!--login interface to ask email and password-->
      <form action="" method="post">
        <b>Email:</b><br>
        <input type="email" name="emai"><br>
        <b>Password:</b><br>
        <input type="password" name="pass"><br>
        <center>
          <button class="btn-large waves-effect waves-light red darken-4 " type="submit" name="submit">Login
          <i class="tiny material-icons right" >send</i>
          </button>
        </center>
      </form>
      </li>
    </ul>    
    <!--navbar-->
    <nav>
      <div class="nav-wrapper red darken-4">
        <a class="brand-logo" style="padding:0px 10px;">Donate For Cause</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <!-- Dropdown Trigger -->
          <li><a class="dropdown-button waves-effect waves-light" href="#!" data-activates="d1" style="width:200px;">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a href="register.php" class="waves-effect waves-light">Sign Up</a></li>
        </ul>
      </div>
    </nav>
    <br><br>
    <div class="container black" style="padding:0px 20px 0px 0px; border-radius:1em;">  
      <br>
      <?php
        //after entering details and pressing submit
        if(isset($_POST["submit"]))
        {
          //connectiong to mysql and database test
          $link = mysql_connect('localhost', 'root', '');
          $mydb = mysql_select_db('test',$link);  
          //storing the input values in variables   
          $emai = $_POST["emai"];
          $pass = $_POST["pass"];
          //reading email and password from userinfo and checking login credentials
          $sql = "SELECT * FROM userinfo WHERE (emai= '$emai' AND pass='$pass')";
          $data = mysql_query($sql);
          $count= mysql_num_rows($data);
          $row=mysql_fetch_assoc($data);
          //row exists only if the existing email pass match
          if($row)
          {
            //to create cookies so that the user is logged in
            setcookie("success","log", time() + (86400 * 30), "/");
            setcookie("emai",$emai, time() + (86400 * 30), "/");
            //redirecting user to dashboard if login successful
            header("Location: http://localhost/DonateForCause/dashboard.php");
          }
          //if there doesn't exit the email pass combination
          else
          {
            echo '<div class="right">Login Failed</div>';
          }
        }
      ?>
      <br><br><br>
      <!--image slider-->
      <div class="carousel">
        <a class="carousel-item" href="#one!"><img src="img/pic4.jpg" width=300px; height=250px;></a>
        <a class="carousel-item" href="#two!"><img src="img/pic1.jpg" width=300px; height=250px;></a>
        <a class="carousel-item" href="#three!"><img src="img/pic6.jpg" width=300px; height=250px;></a>
        <a class="carousel-item" href="#four!"><img src="img/pic3.jpg" width=300px; height=250px;></a>
        <a class="carousel-item" href="#five!"><img src="img/pic5.jpg" width=300px; height=250px;></a>
      </div>
      <br><br>
    </div>
    <!--Import jQuery before materialize.js-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
  </body>
</html>