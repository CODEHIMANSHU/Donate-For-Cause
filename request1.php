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
  	<body background="img/regbg1.png" class="black">
    <!--navbar-->
    <nav>
      <div class="nav-wrapper red darken-4">
        <a class="brand-logo" style="padding:0px 10px;">Donate For Cause</a>
      </div>
    </nav>
    <br><br>
  </head>
  <body>
  <form method="POST" action="">
  	<div class="right"><button class="btn waves-effect waves-light" type="logout" name="logout">Logout
                <i class="material-icons right"></i>
              </button></div>
              </form>
    <br><br><br><br><br><br>
    <div class="row">
        <div class="col s12 m2">. </div>
        <div class="col sl2 m8 white" style="padding:20px 40px 20px 40px; border-radius: 2em 2em 2em 2em;">
 
  
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
            Location:<br>
            <input type="text" name="loca" required><br>
            <div class="left"><button class="btn waves-effect waves-light" type="submit" name="request">Submit
                <i class="material-icons right"></i>
              </button></div>
<br><br><br>
          
            
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
                 echo " Name: ";
                 echo $row['name'];
                 echo ",";
                 echo " Mob: ";
                 echo $row['mobi'];
                 echo ",";
                 echo " Email: ";
                 echo $row['emai'];
                 echo '<br>';
               }
             }
            }
          }
          ?>
</body>
</html>