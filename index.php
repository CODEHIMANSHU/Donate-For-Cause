<!DOCTYPE html>
<html>
  <head>
    <title>
      Donate For Cause
    </title>
  </head>
  <body>

  <!--registration page link-->
  <a href="register.php">Register</a>
  <!--login interface to ask email and password-->
      
    <form action="" method="post">
      Email:<br>
      <input type="email" name="emai"><br>
      Password:<br>
      <input type="password" name="pass"><br>
      <input type="submit" value="Submit" name="submit">
    </form>
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
          echo "Login Failed";
        }
      }
    ?>
  </body>
</html>