<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AllHealth | Patient Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom_login.css">
  </head>
  <body id="loginPatient">
    <?php if(isset($_POST['submit'])) {
      $db = new mysqli("localhost", "root","","allhealth");
      if ($db->connect_error) {
        $alert=1;
        echo $db->connect_error;
      } else {
        $logid = $_POST['LoginNIK'];
        $logpass = $_POST['LoginPASS'];
        if (strlen($logid)==16) {
          $sql1="SELECT * FROM pasiendata WHERE pasiennik ='".$logid."' AND password = '".$logpass."'";
          $rst = $db->query($sql1);
          if($rst->num_rows > 0) {
              $_SESSION['patientid'] = $logid;
              header("Location: dashboard/patient.php");
          }
          else{
            $alert=2;
          }
      }
    }
  }
    if (isset($alert)) {
       if ($alert==2){
          echo "<div class='alert alert-danger' role='alert'>
          Invalid Username or Password</div>";
    }
  }?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 login-box">
        <form method="POST">
            <div class="form-group">
              <label>NIK : </label><small> (Nomor Induk Kependudukan)</small>
              <input type="text" class="form-control" name="LoginNIK" placeholder="NIK" required>
            </div>
            <div class="form-group">
              <label>Password : </label>
              <input type="password" class="form-control" name="LoginPASS" placeholder="Password" required="required">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Sign In</button>
          </form>
        </div>
        <div class="col-md-6 decoration">
          <div class="container-fluid">
            <h1>AllHealth</h1>
            <small>"We give health to All with care"</small>
          </div>
        </div>
      </div>
    </div>

    <script src="js/jquery-slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
