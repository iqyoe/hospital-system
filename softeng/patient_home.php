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
  <body id="AH-patient-home">

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="AH-patient-login">
            <h2>Welcome <?php echo $_SESSION['patient'][1]; ?>!</h2>
            <label for=""><b>NIK:</b></label>
            <p><?php echo $_SESSION['patient'][0]; ?></p>
            <br>
            <label for=""><b>Silakan ke </b></label>
            <p>Dokter <?php echo $_SESSION['patient'][5]; ?></p>
            <p><?php echo $_SESSION['patient'][6]; ?></p>
            <br>
            <a href="index.php" class="btn btn-primary">Back</a>
          </div>
        </div>
      </div>
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
