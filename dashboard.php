<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
          <!--connectiong to mysql and database test-->
<form method="POST" action="">
    <input type="submit" value="Logout" name="logout">
</form>

<a href="request.php">Request</a>
          <?php
          if(isset($_POST["logout"]))
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
            echo '<h1>Login Successful</h1>';
           if($success=="reg")
            echo "Registration Successful";
           $sql = "SELECT * FROM userinfo WHERE (emai= '$emai')";
           $data = mysql_query($sql);
           $count= mysql_num_rows($data);
           $row=mysql_fetch_assoc($data);
           if($row)
           {
             $name=$row['name'];
             echo $name;
             $mobi=$row['mobi'];
             echo $mobi;
             $emai=$row['emai'];
             echo $emai;
             $bloo=$row['bloo'];
             echo $bloo;
             $loca=$row['loca'];
             echo $loca;
             $acti=$row['acti'];
             if($acti==1)
             echo "I am a Donor";
             if($acti==0)
             echo "I am not a Donor";
           }
           else
           {
             echo "Could Not load Profile";
           }
          }
          ?>


</body>
</html>