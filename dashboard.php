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
  <body background="img/regbg1.png" class="black">
    <!--navbar-->
    <nav>
      <div class="nav-wrapper red darken-4">
        <a class="brand-logo" style="padding:0px 10px;">Donate For Cause</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><form action="#" name="out" method="POST"><input class="waves-effect waves-light" type="submit" value="Logout" name="out">  </form></li>
       </ul>
      </div>
    </nav>
          <!--connectiong to mysql and database test-->

          <?php
          if(isset($_POST["out"]))
          {
            setcookie("success","", time() + (86400 * 30), "/");
            setcookie("emai",$emai, time() + (86400 * 30), "/");
            header("Location: http://localhost/DonateForCause/");
          }
          if($_COOKIE['emai']&&$_COOKIE['success'])
          {
           $link = mysql_connect('localhost', 'root', '');
           $mydb = mysql_select_db('test',$link);
           $success=$_COOKIE["success"];
           $emai=$_COOKIE["emai"];
           if($success=="log")
            echo '<div class=" white-text center"><strong><br>Login Successful!!!</strong></div>';
           if($success=="reg")
            echo '<div class="center"><strong><br>Registration Successful!!!</strong></div>';
          }
          ?>
    <div class="container">
    <div class="row">
    <div class="col s12 m9">
          <?php
          if($_COOKIE['emai']&&$_COOKIE['success'])
          {
           $link = mysql_connect('localhost', 'root', '');
           $mydb = mysql_select_db('test',$link);
           $success=$_COOKIE["success"];
           $emai=$_COOKIE["emai"];
           $sql = "SELECT * FROM userinfo WHERE (emai= '$emai')";
           $data = mysql_query($sql);
           $count= mysql_num_rows($data);
           $row=mysql_fetch_assoc($data);
           if($row)
           {
             $name=$row['name'];
             $mobi=$row['mobi'];
             $emai=$row['emai'];
             $bloo=$row['bloo'];
             $loca=$row['loca'];
             $acti=$row['acti'];
           }
           else
           {
             echo "Could Not load Profile";
           }
          }
          ?>
                <ul class="collection with-header">
                  <li class="collection-header" ><h4><?php echo $name; ?></h4></li>
                  <li class="collection-item">Mobile No.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?php echo $mobi; ?></li>
                  <li class="collection-item">Email Id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?php echo $emai; ?></li>
                  <li class="collection-item">Blood Group&nbsp;&nbsp;:&nbsp;<?php echo $bloo; ?></li>
                  <li class="collection-item">Location&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?php echo $loca; ?></li>
                </ul>

      </div>
      <div class="col s12 m3 white">
      <a href="request1.php"><img src="img/req.png" height=250px;></a>
      </div>
    </div>
    </div>
    <!--Import jQuery before materialize.js-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>


</body>
</html>