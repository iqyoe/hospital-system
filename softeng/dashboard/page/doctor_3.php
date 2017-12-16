<?php
if(!isset($_POST['submit'])){?>
<div class="row">
  <div class="col-md-12">
    <div class="x_title">
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li><a class="" id="myBtn" ><i class="fa fa-plus green"></i></a>
        </li>
        <li><a class="close-link"><i class="fa fa-close red"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <p class="text-muted font-13 m-b-30">
      </p>
      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>ID</th>
            <th>NIK</th>
            <th>Name</th>
            <th>Sex</th>
            <th>Birthdate <small>dd/mm/yyy</small></th>
            <th>Address</th>
            <th></th>
          </tr>
        </thead>
        <tbody>

            <?php
              $db = new mysqli("localhost", "root","","allhealth");
              $sql1="SELECT * FROM history as h INNER JOIN pasiendata as p ON h.pasiennik = p.pasiennik INNER JOIN accesscontrol as a ON h.aksesid = a.aksesid WHERE h.aksesid = '".$_SESSION['staffactive'][1]."' AND h.status = '1'";
              $rst = $db->query($sql1);
              if ($rst->num_rows > 0) {
              while ($r = $rst->fetch_assoc()) {
                echo '<tr>j<form method="POST">
                  <td>'.$r['id'].'</td>
                  <td>'.$r['pasiennik'].'</td>
                  <td>'.$r['nama_pasien'].'</td>
                  <td>'.$r['jenis_kelamin'].'</td>
                  <td>'.$r['ttl'].'</td>
                  <td>'.$r['alamat'].'</td>
                  <td><button name="submit" value="'.$r['id'].'">Call</button></td>
                </form></tr>';
                }
              }?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php }elseif(isset($_POST['submit'])){
  $_SESSION['id'] = $_POST['submit'];
  $db = new mysqli("localhost", "root","","allhealth");
  $sql1="SELECT * FROM history as h INNER JOIN pasiendata as p ON h.pasiennik = p.pasiennik INNER JOIN accesscontrol as a ON h.aksesid = a.aksesid WHERE h.aksesid = '".$_SESSION['staffactive'][1]."' AND h.id = '".$_POST['submit']."'";
  $rst = $db->query($sql1);
  $r = $rst->fetch_assoc();
  ?><div class="x_content">
    <!-- start form for validation -->

    <form id="demo-form" data-parsley-validate method='POST'>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-3">Date</label>
        <div class="col-md-9 col-sm-9 col-xs-9">
          <?php echo substr($r['hari'],0,4)."/".substr($r['hari'],4,2)."/".substr($r['hari'],6,2);?>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Patient</label><label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $r['nama_pasien']?></label>
      </div>
      <br><br>

      <label for="message">Medication (20 chars min, 100 max) :</label>
      <textarea id="message" required="required" class="form-control" name="medication" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
      data-parsley-validation-threshold="10"></textarea>

      <label for="message">Note (20 chars min, 100 max) :</label>
      <textarea id="message" required="required" class="form-control" name="note" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
      data-parsley-validation-threshold="10"></textarea>

      <br/>
      <button class="btn btn-primary" name="validate">Validate form</button>

    </form>

  </div>
  <?php
}
if(isset($_POST['validate'])){
  $sql3 = "UPDATE history SET report = '".$_POST['note']."', medication = '".$_POST['medication']."', status='2' WHERE id = '".$_SESSION['id']."'";
  $rst = $db->query($sql3);
  echo "<meta http-equiv='refresh' content='0'>";
}
?>
