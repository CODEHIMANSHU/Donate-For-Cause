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
      </div>
    </nav>
    <br><br><br>
    <div class="container" style="padding:20px 40px 20px 40px; border-radius: 2em 2em 2em 2em;">
      <div class="row">
        <div class="col s12 m2">. </div>
        <div class="col sl2 m8 white" style="padding:20px 40px 20px 40px; border-radius: 2em 2em 2em 2em;">
 


<!--connectiong to mysql and database test-->
          <?php
           $link = mysql_connect('localhost', 'root', '');
           $mydb = mysql_select_db('test',$link);
          ?>

<!--login interface-->
        <div>
          <form action="" method="post">
            Name:<br>
            <input type="text" name="name" required><br>
            Blood Group:<br>
              <input name="bloo" type="radio" id="test1" />
                <label for="test1">AB+&nbsp;&nbsp;&nbsp;</label>
              <input name="bloo" type="radio" id="test2" />
                <label for="test2">AB-&nbsp;&nbsp;&nbsp;</label>
              <input name="bloo" type="radio" id="test3" />
                <label for="test3">A-&nbsp;&nbsp;&nbsp;</label>
              <input name="bloo" type="radio" id="test4" />
                <label for="test4">B+&nbsp;&nbsp;&nbsp;</label>
              <input name="bloo" type="radio" id="test5" />
                <label for="test5">B-&nbsp;&nbsp;&nbsp;</label>
              <input name="bloo" type="radio" id="test6" />
                <label for="test6">O+&nbsp;&nbsp;&nbsp;</label>
              <input name="bloo" type="radio" id="test7" />
                <label for="test7">O-&nbsp;&nbsp;&nbsp;</label>
                <br><br>
             
            
            Email Id:<br>
            <input type="email" name="emai" required><br>
            Mobile No.:<br>
            <input type="number" name="mobi" required><br>
            Location:<br>
            <input type="text" name="loca" required><br>
            Password:<br>
            <input type="password" name="pass" required><br>
            Are you a regular Donor:<br>
            <input name="acti" type="radio" id="test8" />
              <label for="test8">ALWAYS READY</label>
            <input name="acti" type="radio" id="test9" />
              <label for="test9">NOT NOW</label>
              <br><br>
             <div class="center"><button class="btn waves-effect waves-light" type="submit" name="submit">Submit
                <i class="material-icons right"></i>
              </button></div>
          </form>
        </div>
        </div>
        </div>
        </div> 
         <?php
         if(isset($_POST["submit"]))
         {
           $link = mysql_connect('localhost', 'root', '');
           $mydb = mysql_select_db('test',$link);
           $name = $_POST['name'];
           $bloo = $_POST['bloo'];
           $emai = $_POST['emai'];
           $mobi = $_POST['mobi'];
           $loca = $_POST['loca'];
           $acti = $_POST['acti'];
           $pass = $_POST['pass'];
           $query = mysql_query("SELECT * FROM userinfo WHERE emai='$emai'");
           $numrows = mysql_num_rows($query);
           if($numrows==0)
           {
             $result = mysql_query("INSERT INTO userinfo VALUES ('$name','$mobi','$emai','$bloo','$pass','$loca','$acti')");
             if($result)
             {
               setcookie("success","reg", time() + (86400 * 30), "/");
               setcookie("emai",$emai, time() + (86400 * 30), "/");
               header("Location: http://localhost/DonateForCause/dashboard.php");
             }
             else
             {
                echo "Failed to create";
             }
           }
           else
           {
             echo "Email Already Exist!Please Try Again With Another";
           }
          }
          ?>
    <!--Import jQuery before materialize.js-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

</body>
</html>