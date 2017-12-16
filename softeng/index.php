<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AllHealth</title>
    <link href="dashboard/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body id="AH-patient-index">

    <div class="container">
      <div class="row">
        <?php
          $db = new mysqli("localhost", "root","","allhealth");
          $rs = '0001';
          $sql1="SELECT * FROM rumahsakit WHERE rsid= '".$rs. "'";
          $res = $db->query($sql1);
          $r = $res->fetch_assoc();
        ?>
        <div class="col-md-8 content" id="desc">
          <h1>ALLHealth</h1>
          <p>Selamat Datang! Silahkan isi form hanya dengan memasukan NIK Anda. Lalu, Anda akan mendapat nomor antrian untuk menunggu.</p>
        </div>
        <div class="col-md-4 content">

          <h2><i class="fa fa-building-o"></i> <?php echo $r['namars']; ?></h2>
          <form class="" action="index.php" method="post">
            <div class="form-group">
              <label>NIK:</label>
              <input type="text" class="form-control" name="quenik" placeholder="002XXXXXXXXXXXXX">
            </div>
            <?php

            if($r['umum']==1){
              echo '
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="toDokter1" id="radioBtn" value="umum"> Umum
                </label>
              </div>
              ';
              }
            if($r['gigi']==1){
              echo '
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="toDokter2" id="radioBtn" value="gigi"> Gigi
                </label>
              </div>
              ';
              }
            if($r['jantung']==1){
              echo '
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="toDokter3" id="radioBtn" value="jantung"> Jantung
                </label>
              </div>
              ';
              }
              /*if(isset($_POST['queUmum']) || isset($_POST['queGigi']) || isset($_POST['queJantung'])){
                  if(strlen($_POST['quenik'])==12){
                    if (isset($_POST['queUmum'])) {
                      $doctor = 'Umum';
                    } else if (isset($_POST['queGigi'])){
                      $doctor = 'Gigi';
                    } else if (isset($_POST['queJantung'])){
                      $doctor = 'Jantung';
                    }
                    $_SESSION['patient'] = array($_POST['quenik'], 'samuel', 2, 3, 4, $doctor, 'Dr. Samuel Anthony, Sp.KK, Sp.BP-RE');
                    header('location:patient_home.php');
                }
              }*/
            ?>
            <input type="submit" name="queSubmit" class="btn btn-primary" value="Masuk">
          </form>
          <?php
            if (isset($_POST['queSubmit'])) {
              $db = new mysqli("localhost", "root","","allhealth");
              $y = date("Y");
              $m = date("m");
              $h = date("d");
              $date = $y.$m.$h;
              if(isset($_POST['toDokter1'])){
                $sql2= "SELECT * FROM history WHERE hari='".$date."' AND aksesid = '0002'";
                $rst = $db->query($sql2);
                if ($rst->num_rows > 0) {
                  $num = 1;
                  while ($r = $rst->fetch_assoc()) {
                    $num +=1;
                  }
                  $sql3 ="INSERT INTO history VALUES (".$num." ,".$date.", ".$_POST['quenik'].",".$rs.",'0002', '' ,'queue')";
                  $go = $db->query($sql3);
                }
                else {
                  $sql3 ="INSERT INTO history VALUES ('1' ,".$date.", ".$_POST['quenik'].",".$rs.",'0002', '' ,'queue')";
                  $go = $db->query($sql3);
                }
              }
              elseif(isset($_POST['toDokter2'])) {
                $sql2= "SELECT * FROM history WHERE hari='".$date."' AND aksesid = '0003'";
                $rst = $db->query($sql2);
                if ($rst->num_rows > 0) {
                  $num = 1;
                  while ($r = $rst->fetch_assoc()) {
                    $num +=1;
                  }
                  $sql3 ="INSERT INTO history VALUES (".$num." ,".$date.", ".$_POST['quenik'].",".$rs.",'0003', '' ,'queue')";
                  $go = $db->query($sql3);
                }
                else{
                  $sql3 ="INSERT INTO history VALUES ('1' ,".$date.", ".$_POST['quenik'].",".$rs.",'0003', '' ,'queue')";
                  $go = $db->query($sql3);
                }
              }
              elseif(isset($_POST['toDokter3'])) {
                $sql2="SELECT * FROM history WHERE hari='".$date."' AND aksesid = '0004'";
                $rst = $db->query($sql2);
                if ($rst->num_rows > 0) {
                  $num = 1;
                  while ($r = $rst->fetch_assoc()) {
                    $num +=1;
                  }
                  $sql3 ="INSERT INTO history VALUES (".$num." ,".$date.", ".$_POST['quenik'].",".$rs.",'0004', '' ,'queue')";
                  $go = $db->query($sql3);
                }
                else {
                  $sql3 ="INSERT INTO history VALUES ('1' ,".$date.", ".$_POST['quenik'].",".$rs.",'0004', '' ,'queue')";
                  $go = $db->query($sql3);
                }
              }
            }
          ?>
        </div>
      </div>
      <br>
      <br>
    </div>
    <div class="navbar fixed-bottom justify-between-content">
      <a class="btn btn-outline-light text-right" href="staff_login.php"></a>
      <a class="btn btn-outline-danger" href="logout.php"></a>
    </div>
    <?php

    ?>
    <script src="js/jquery-slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
