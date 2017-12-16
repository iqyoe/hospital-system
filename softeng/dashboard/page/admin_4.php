<div class="">
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
                $db = new mysqli("localhost", "root","","allhealth");
                $qu = "SELECT * FROM pasiendata";
                $res = $db->query($qu);
                if ($res->num_rows >0) {
                  while ($r=$res->fetch_assoc()) {
                    if ($r['jenis_kelamin']=="L") {
                      $sex = 'Male';
                    } else {
                      $sex = 'Female';
                    }
                    $d = explode("-",$r['ttl']);
                    echo "<tr>
                    <td>".$r['pasiennik']."</td>
                    <td>".$r['nama_pasien']."</td>
                    <td>".$sex."</td>
                    <td>".$d[1]."/".$d[2]."/".$d[3]."</td>
                    <td>".$r['alamat']."</td>
                    </tr>";
                  }
                }
              ?>
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
          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Invoice Number</th>
                <th>NIK</th>
                <th>Name</th>
                <th>Date</th>
                <th>Status</th>
                <th>Detail</th>
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
              </tr>';
              }
            }?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
