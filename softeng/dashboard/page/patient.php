<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Edit Data</h3>
    </div>
  </div>


<div class="popup">
  <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Prescription Form <small>Click to validate</small></h2>
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
          <?php
            if (isset($_POST['update'])){
              $sql2="UPDATE pasiendata SET alamat = '".$_POST['message']."' WHERE pasiennik = '".$_SESSION['patientid']."';";
              $res = $db->query($sql2);
              echo "<meta http-equiv='refresh' content='0'>";
            }

          ?>
          <!-- start form for validation -->

          <form id="demo-form" data-parsley-validate method="POST">
            <label for="fullname">Patient Name :</label>
            <label for="message"><?php echo $r['nama_pasien']?></label>
            <br><br>
            <label for="date">Birth Date :</label>
            <label for="message"><?php echo $r['ttl']?></label>
            <br><br>
            <label for="date">Gender :</label>
            <label for="message"><?php echo $r['jenis_kelamin']?></label>
            <br><br>
            <label for="message">Alamat :</label>
            <textarea id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
            data-parsley-validation-threshold="10"><?php echo $r['alamat']?></textarea>

              <br/>
              <BUTTON class="btn btn-primary" name="update">Validate form</BUTTON>

          </form>
          <!-- end form for validations -->

        </div>
      </div>
    </div>
  </div>
</div>
