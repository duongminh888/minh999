<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Top Navigation</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url('')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('')}}/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('')}}/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('')}}/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{url('')}}/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
    .chitiet:hover {
      text-decoration: underline;
    }
  </style>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
      @foreach($mem as $m)

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="{{url('')}}/index2.html" class="navbar-brand"><b>Meup</b>68</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="{{url('')}}/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">{{$m->hoten}}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="{{url('')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> 
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="{{url('demomember')}}" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Xin Chào: {{$m->hoten}}
        </h1>
      </section>
      @endforeach
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Khoản vay của bạn</h3>
                <div class="box-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tbody><tr>
                    <th>#</th>
                    <th>Mã HĐ</th>
                    <th>Họ tên</th>
                    <th>Số tiền</th>
                    <th>Ngày Cho vay</th>
                    <th>Lãi đến hôm nay</th>
                    <th>Tình trạng hợp đồng</th>
                    <th>Ngày phải đóng lãi</th>
                    <th></th>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>183</td>
                    <td>John Doe</td>
                    <td>9.900đ</td>
                    <td>11-7-2014</td>
                    <td>900đ</td>
                    <td><span class="label label-success">Hoàn tất</span></td>
                    <td>20-2-2020</td>
                    <td><a href="#" class="chitiet">Chi tiết</a></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>219</td>
                    <td>Alexander Pierce</td>
                    <td>9.900đ</td>
                    <td>11-7-2014</td>
                    <td>900đ</td>
                    <td><span class="label label-warning">Đang vay</span></td>
                    <td>20-2-2020</td>
                    <td><a href="#" class="chitiet">Chi tiết</a></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>175</td>
                    <td>Mike Doe</td>
                    <td>9.900đ</td>
                    <td>11-7-2014</td>
                    <td>900đ</td>
                    <td><span class="label label-danger">Nợ sấu</span></td>
                    <td>20-2-2020</td>
                    <td><a href="#" class="chitiet">Chi tiết</a></td>
                  </tr>
                </tbody></table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Hợp đồng vay tiền</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tbody><tr>
                    <th>STT</th>
                    <th>Ngày</th>
                    <th>Số ngày</th>
                    <th>Tiền lãi</th>
                    <th>Tiền khác</th>
                    <th>Tổng lãi</th>
                    <th>Tiền khách trả</th>
                    <th>Tình trạng</th>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>5-2-2018</td>
                    <td>7</td>
                    <td>900.000 VNĐ</td>
                    <td>0 VNĐ</td>
                    <td>900.000 VNĐ</td>
                    <td>900.000 VNĐ</td>
                    <td><span class="label label-danger">Chưa thanh toán</span></td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>12-2-2018</td>
                    <td>7</td>
                    <td>900.000 VNĐ</td>
                    <td>0 VNĐ</td>
                    <td>900.000 VNĐ</td>
                    <td>900.000 VNĐ</td>
                    <td><span class="label label-success">Đã thanh toán</span></td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>19-2-2018</td>
                    <td>7</td>
                    <td>900.000 VNĐ</td>
                    <td>0 VNĐ</td>
                    <td>900.000 VNĐ</td>
                    <td>900.000 VNĐ</td>
                    <td><span class="label label-warning">Chưa thanh toán</span></td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>26-2-2018</td>
                    <td>7</td>
                    <td>900.000 VNĐ</td>
                    <td>0 VNĐ</td>
                    <td>900.000 VNĐ</td>
                    <td>900.000 VNĐ</td>
                    <td><span class="label label-warning">Chưa thanh toán</span></td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>19-2-2018</td>
                    <td>7</td>
                    <td>900.000 VNĐ</td>
                    <td>0 VNĐ</td>
                    <td>900.000 VNĐ</td>
                    <td>900.000 VNĐ</td>
                    <td><span class="label label-warning">Chưa thanh toán</span></td>
                  </tr>
                </tbody></table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
      </div>
      <strong>Dương Minh
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{url('')}}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="{{url('')}}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{url('')}}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{url('')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('')}}/dist/js/demo.js"></script>
</body>
</html>
