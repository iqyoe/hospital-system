<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Departements <small>Departements of  doctor available at Hospital</small></h3>
    </div>

    <div class="title_right">
      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for Departement">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Departments <small>Departements control</small></h2>
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
          <br />
          <form class="" action="" method="post">
            <?php
              $db = new mysqli("localhost", "root","","allhealth");
              $q1 = "SELECT * FROM rumahsakit WHERE rsid='0001'";
              $rs = $db->query($q1);
              if ($rs->num_rows>0) {
                while ($r=$rs->fetch_assoc()) {
                  $um = $r['umum'];
                  $gi = $r['gigi'];
                  $ja = $r['jantung'];
                }
              }
              /*$um=0;
              $gi=1;
              $ja=1;*/
            ?>
            <label for="">Departements : </label>
            <div class="checkbox">
              <label>
                <?php if ($um==1){echo'
                  <input type="checkbox" class="flat" name="umum" value="1" checked> umum
                ';}else { echo'
                  <input type="checkbox" class="flat" name="umum" value="1"> umum
                ';} ?>
              </label>
              <label>
                <?php if ($gi==1){echo'
                  <input type="checkbox" class="flat" name="gigi" value="1" checked> gigi
                ';}else { echo'
                  <input type="checkbox" class="flat" name="gigi" value="1"> gigi
                ';} ?>
              </label>
              <label>
                <?php if ($ja==1){echo'
                  <input type="checkbox" class="flat" name="jantung" value="1" checked> jantung
                ';}else { echo'
                  <input type="checkbox" class="flat" name="jantung" value="1"> jantung
                ';} ?>
              </label>
            </div>
            <div class="form-group">
              <input class="btn btn-primary" type="submit" name="valid" value="validate">
            </div>
          </form>
          <?php if (isset($_POST['valid'])) {
            if (isset($_POST['jantung'])) {
              $j= 1;
            } else {
              $j= 0;
            }
            if (isset($_POST['umum'])) {
              $u= 1;
            } else {
              $u= 0;
            }
            if (isset($_POST['gigi'])) {
              $g= 1;
            } else {
              $g= 0;
            }
            $q2="UPDATE rumahsakit SET umum='".$u."', jantung='".$j."', gigi='".$g."' WHERE rsid='0001'";
            $update = $db->query($q2);
            echo "<meta http-equiv='refresh' content=0>";
          } ?>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Departement Details<small>Explaination about Departement to help patients</small></h2>
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
            As Admin, you can manage departement available that related to the Hospital. Here you can remove and edit departements. Changing of details required high authoriation.
          </p>
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Departement</th>
                <th>Description</th>
                <th>Icon</th>
                <th>Management</th>
              </tr>
            </thead>


            <tbody>
              <tr>
                <td>Umum</td>
                <td><p>
                  Lorem ipsum dolor sit amet, mei at facilis posidonium temporibus. Appetere moderatius usu cu, in qui erant accommodare. Recusabo praesent in mel. At tritani adolescens complectitur qui, mea mucius appellantur deterruisset cu, nec aperiri atomorum ne. An veri splendide nec, te eum cibo mazim oblique.
                </p></td>
                <td><img src="../img/stethoscope.png" class="img-responsive"/></td>
                <td><button type="button" class="btn btn-round btn-primary">Edit</button><button type="button" class="btn btn-round btn-danger">Delete</button></td>
              </tr>

              <tr>
                <td>Gigi</td>
                <td><p>
                  Lorem ipsum dolor sit amet, mei at facilis posidonium temporibus. Appetere moderatius usu cu, in qui erant accommodare. Recusabo praesent in mel. At tritani adolescens complectitur qui, mea mucius appellantur deterruisset cu, nec aperiri atomorum ne. An veri splendide nec, te eum cibo mazim oblique.
                </p></td>
                <td><img src="../img/molar.png" class="img-responsive"/></td>
                <td><button type="button" class="btn btn-round btn-primary">Edit</button><button type="button" class="btn btn-round btn-danger">Delete</button></td>
              </tr>

              <tr>
                <td>Jantung</td>
                <td><p>
                  Lorem ipsum dolor sit amet, mei at facilis posidonium temporibus. Appetere moderatius usu cu, in qui erant accommodare. Recusabo praesent in mel. At tritani adolescens complectitur qui, mea mucius appellantur deterruisset cu, nec aperiri atomorum ne. An veri splendide nec, te eum cibo mazim oblique.
                </p></td>
                <td><img src="../img/heart.png" class="img-responsive"/></td>
                <td><button type="button" class="btn btn-round btn-primary">Edit</button><button type="button" class="btn btn-round btn-danger">Delete</button></td>
              </tr>
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
