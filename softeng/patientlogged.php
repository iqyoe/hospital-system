<?php
  session_start();
  if (isset($_SESSION['patient'])) {
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AllHealth</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body id="AH-patient-index">
    <nav class="navbar navbar-expand-lg justify-content-between">
      <a class="navbar-brand" href="#">AllHealth</a>
      <a class="btn btn-outline-primary" href="stafflogin.php">staff</a>
    </nav>

    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="AH-patient-login">
            <h2>Patient Queue</h2>

          </div>
        </div>
        <div class="col-md-8">
          <div class="AH-patient-login">
            <h2>Welcome <?php echo $_SESSION['patient'][1]; ?>!</h2>
            <label for=""><b>NIK:</b> <input class="form-control" type="text" value="<?php echo $_SESSION['patient'][0] ?>" readonly></label>
            <br>
            <label for=""><b>Keluhan:</b></label>
            <input class="form-control" type="text" value="<?php echo $_SESSION['patient'][5]; ?>" readonly>
            <br>
            <a href="index.php" class="btn btn-primary">Back</a>
          </div>
        </div>
      </div>
    </div>

    <div class="navbar fixed-bottom justify-between-content">
      <a class="btn btn-outline-light text-right" href="stafflogin.php"></a>
      <a class="btn btn-outline-danger" href="logout.php"></a>
    </div>

    <script src="js/jquery-slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php
} else{
  header('Location: index.php');
}
?>
