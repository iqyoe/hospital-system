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
                <th>Antrian</th>
                <th>NIK</th>
                <th>Date</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $db = new mysqli("localhost", "root","","allhealth");
                $qu = "SELECT * FROM history WHERE rsid='1'";
                $res = $db->query($qu);
                if ($res->num_rows >0) {
                  while ($r=$res->fetch_assoc()) {
                    if ($r['status']==3) {
                      $st = '<span class="green">paid</span>';
                    } else {
                      $st = '<span class="red">unpaid</span>';
                    }
                    echo "<tr>
                    <td>".$r['id']."</td>
                    <td>".$r['antrian']."</td>
                    <td>".$r['pasiennik']."</td>
                    <td>".$r['hari']."</td>
                    <td>".$st."</td>
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

</div>
