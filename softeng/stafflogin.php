<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AllHealth</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body id="AH-index">
    <nav class="navbar navbar-expand-lg justify-content-between">
      <a class="navbar-brand" href="#">AllHealth</a>
    </nav>

    <div class="container">
      <div class="AH-Login">
        <h1>Login</h1>
        <?php
        if (isset($_POST['submitlogin'])) {
          $db = new mysqli("localhost", "root","","allhealth");
          if ($db->connect_errno) {
            $alert=1;
            echo $db->connect_error;
          } else {
            $logid = (string)$_POST['logid'];
            $logpass = (string)$_POST['logpass'];
            //$logid = stripcslashes($logid);
            $logpass = stripcslashes($logpass);
            //$logid = mysql_real_escape_string($logid);
            $logpass = mysql_real_escape_string($logpass);

            if (strlen($logid)==12) {
              $logrs = substr($logid,0,4);
              $logprof = substr($logid,4,4);
              $logstaff = substr($logid,8,4);
              $sql1="SELECT s.staffid, s.pwd, s.nama, s.telepon, r.rsid, r.namars, a.aksesid, a.profesi, a.adm, a.rec FROM staff AS s INNER JOIN rumahsakit AS r ON s.rsid = r.rsid INNER JOIN accesscontrol AS a ON s.aksesid=a.aksesid WHERE staffid='".$logstaff."'";
              $res = $db->query($sql1);
              if ($res->num_rows > 0) {
                while ($r = $res->fetch_assoc()) {
                  $staffid = $r['staffid'];
                  $rsid=$r['rsid'];
                  $aksesid=$r['aksesid'];
                  $pass = $r['pwd'];
                  $nama = $r['nama'];
                  $telepon = $r['telepon'];
                  $namars = $r['namars'];
                  $profesi = $r['profesi'];
                  $akses_adm = $r['adm'];
                  $akses_rec = $r['rec'];
                }


                if ($staffid==$logstaff&&$pass==$logpass) {
                  $alert=3;
                  $_SESSION['user'] = array($rsid, $aksesid, $staffid, $namars, $nama, $telepon, $profesi, $akses_adm, $akses_rec);
                  for($ck = 0; $ck<count($logid);$ck++){
                    echo $logid[$ck]." ";
                  }
                  $db->close();
                  if ($aksesid=="0002") {
                    header("Location: dashboard/dashboard.php?p=2");
                  } else {
                    header("Location: dashboard/dashboard.php?p=1");
                  }

                }
              } else {
                echo $db->error;
                $alert=2;
              }
              echo $logid." ".$logstaff;
            }else{
              $alert=2;
            }
          }
        }

        if (isset($alert)) {
          if ($alert==1) {
            echo "<div class='alert alert-danger' role='alert'>
            ".$dbconnect->connect_error."
            </div>";
            for($ck = 0; $ck<count($logid);$ck++){
              echo $logid[$ck]."t";
            }
          } else if ($alert==2){
            if (!mysqli_query($db, $sql1)) {
              echo "<div class='alert alert-danger' role='alert'>
              Invalid Username or Password</div>";
            }
          } else if ($alert==3) {
            echo "<div class='alert alert-success' role='alert'>
            Login SUCCESS as ".$nama."
            </div>";
          };
        }
         ?>
        <form action="stafflogin.php" method="post">
          <div class="form-group">
            <label for="StaffID">Staff ID:</label>
            <input type="text" class="form-control" name="logid" value="" placeholder="Staff ID Number">
          </div>
          <div class="form-group">
            <label for="StaffPassword">Password:</label>
            <input type="password" class="form-control" name="logpass" value="" placeholder="Password">
          </div>
          <button type="submit" name="submitlogin"class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>

    <?php

    ?>
    <script src="js/jquery-slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
