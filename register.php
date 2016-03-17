<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>

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
            <input type="radio" name="bloo" value="1" checked> AB+<br>
            <input type="radio" name="bloo" value="2" checked> AB-<br>
            <input type="radio" name="bloo" value="3"> A+<br>
            <input type="radio" name="bloo" value="4"> A-<br>
            <input type="radio" name="bloo" value="5"> B+<br>
            <input type="radio" name="bloo" value="6"> B-<br>
            <input type="radio" name="bloo" value="7"> O+<br>
            <input type="radio" name="bloo" value="8"> O-<br>
            Email Id:<br>
            <input type="email" name="emai" required><br>
            Mobile No.:<br>
            <input type="number" name="mobi" required><br>
            Location:<br>
            <input type="text" name="loca" required><br>
            Password:<br>
            <input type="password" name="pass" required><br>
            Are you a regular Donor:<br>
            <input type="radio" name="acti" value="1" checked> ALWAYS READY<br>
            <input type="radio" name="acti" value="0">NOT NOW<br>
            <input type="submit" value="Register" name="submit">
          </form>
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

</body>
</html>