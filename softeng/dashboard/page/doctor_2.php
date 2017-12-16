<?php
$db = new mysqli("localhost", "root","","allhealth");
 if(!isset($_POST['edit'])){?><div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Patients <small>Patients connected to the Blockchain</small></h3>
    </div>

  </div>


  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Patients <small>patient registered in blockchain</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
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
                <th>NIK</th>
                <th>Name</th>
                <th>Sex</th>
                <th>Birthdate <small>dd/mm/yyy</small></th>
                <th>Address</th>
                </tr>
            </thead>
            <tbody>
              <?php
                $sql1="SELECT * FROM  pasiendata";
                $rst = $db->query($sql1);
                if ($rst->num_rows > 0) {
                while ($r = $rst->fetch_assoc()) {
                  echo '<tr>
                    <th>'.$r['pasiennik'].'</th>
                    <th>'.$r['nama_pasien'].'</th>
                    <th>'.$r['jenis_kelamin'].'</th>
                    <th>'.$r['ttl'].'</th>
                    <th>'.$r['alamat'].'</th>
                  </tr>';
                  }
                }?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Invoice <small>patient invoice to be payed</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>

        <div class="x_content">
          <p class="text-muted font-13 m-b-30">
          </p>
          <form method="POST">
          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Invoice Number</th>
                <th>NIK</th>
                <th>Name</th>
                <th>Date</th>
                <th>Status</th>
                <th>Detail</th>
                <th>Edit</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql2="SELECT * FROM history as h INNER JOIN pasiendata as p ON h.pasiennik = p.pasiennik INNER JOIN accesscontrol as a ON h.aksesid = a.aksesid WHERE h.aksesid = '".$_SESSION['staffactive'][1]."' AND h.status='2'";
              $rst = $db->query($sql2);
              if ($rst->num_rows > 0) {
                while ($r = $rst->fetch_assoc()) {
                  if ($r['status']==2) {
                    $st = '<span class="green">done</span>';
                  } else {
                    $st = '<span class="red">queue</span>';
                  }
                  echo '<tr>
                <td>'.$r['antrian'].$r['hari'].$r['aksesid'].'</td>
                <td>'.$r['pasiennik'].'</td>
                <td>'.$r['nama_pasien'].'</td>
                <td>'.$r['hari'].'</td>
                <td>'.$st.'</td>
                <td>'.$r['report'].'</td>
                <td><button name="edit" value='.$r['id'].'>Edit</button></td>
              </tr>';
              }
            }?>
            </tbody>
          </table>
        </form>
        </div>
      </div>
    </div>
  </div>

</div>
<?php }
if(isset($_POST['edit'])){
  $_SESSION['id'] = $_POST['edit'];
  $sql2="SELECT * FROM history as h INNER JOIN pasiendata as p ON h.pasiennik = p.pasiennik INNER JOIN accesscontrol as a ON h.aksesid = a.aksesid WHERE h.aksesid = '".$_SESSION['staffactive'][1]."' AND h.id = '".$_POST['edit']."'";
  $rst = $db->query($sql2);
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
  $sql3 = "UPDATE history SET report = '".$_POST['note']."', medication = '".$_POST['medication']."' WHERE id = '".$_SESSION['id']."'";
  $rst = $db->query($sql3);
  echo "<meta http-equiv='refresh' content='0'>";
}
