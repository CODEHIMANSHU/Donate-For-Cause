<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
  <form method="POST" action="">
    <input type="submit" value="Logout" name="logout">
  </form>

          <form action="" method="post">
            Blood Group:<br>
            <input type="text" name="bloo"><br>
            Location:<br>
            <input type="text" name="loca"><br>
            <input type="submit" value="Submit" name="request">
          </form>
          <?php
          if(isset($_POST["logout"]))
          {
            setcookie("success","", time() + (86400 * 30), "/");
            setcookie("emai",$emai, time() + (86400 * 30), "/");
            header("Location: http://localhost/DonateForCause/");
          }
          if($_COOKIE['emai']&&$_COOKIE['success'])
          {
            if(isset($_POST["request"]))
            {
             $link = mysql_connect('localhost', 'root', '');
             $mydb = mysql_select_db('test',$link);
             $loca = $_POST['loca'];
             $bloo = $_POST['bloo'];
             $query = mysql_query("SELECT * FROM userinfo WHERE loca='$loca'");
             $numrows = mysql_num_rows($query);
             if($numrows==0)
             {
              echo "No one available nearby"; 
             }
             else
             {
               while($row=mysql_fetch_assoc($query))
               {
                 echo $row['name'];
               }
             }
            }
          }
          ?>
</body>
</html>