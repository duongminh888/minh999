<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Top Navigation</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url('public')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('public')}}/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('public')}}/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('public')}}/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{url('public')}}/dist/css/skins/_all-skins.min.css">

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
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="{{url('')}}/" class="navbar-brand"><b>Meup</b>68</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
        <!-- /.navbar-collapse -->
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
          Xin Chào: 
        </h1>
        @if($pgd == 0)
        <h4>Hãy chọn phòng giao dịch gần bạn nhất</h4>
        @endif
      </section>
      <!-- Main content -->
      <section class="content">
        @if($pgd == 0)
        <div class="row">
          @foreach($phonggiaodich as $phonggd)
          <div class="col-md-4" >
            <div class="box box-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-aqua-active">
                <h3 class="widget-user-username">Phòng giao dịch: {{$phonggd->name}}</h3>
                <h5 class="widget-user-desc">Địa chỉ: {{$phonggd->diachi}}</h5>
              </div>
              <div class="widget-user-image">
                <a href="{{url('picpgd')}}/{{$phonggd->id}}">
                <div style="width: 90px;height: 90px;border: 3px solid #fff;border-radius: 100%;text-align: center;background-color: #00a65a;color: #fff;font-size: 21px;padding-top: 28px;font-weight: bold;cursor: pointer;">Tiếp tục</div>
                </a>
                <!-- <img class="img-circle" src="{{url('')}}/dist/img/user1-128x128.jpg" > -->
              </div>
            </div>
          </div>
          @endforeach
        </div>
        @else
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Hợp đồng vay tiền</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tbody><tr>
                    <th style="width: 50px">ID</th>
                    <th>Ngày</th>
                    <th>Số ngày</th>
                    <th>Số tiền</th>
                    <th>Tình trạng</th>
                  </tr>
                  @foreach($hoso as $hs)
                  <tr>
                    <td>{{$hs->id}}</td>
                    <td>{{$hs->created_at}}</td>
                    <td>{{$hs->songay}}</td>
                    <td>{{$hs->sotienvay}}</td>
                    <td>
                      @foreach($trangthaihoso as $tths)
                        @if($hs->trangthaihopdong == 1 && $hs->trangthaihopdong == $tths->id)
                        <span class="label label-warning">{{$tths->name}}</span>
                        @elseif($hs->trangthaihopdong == 2 && $hs->trangthaihopdong == $tths->id)
                        <span class="label label-success">{{$tths->name}}</span>
                        @elseif($hs->trangthaihopdong == 5 && $hs->trangthaihopdong == $tths->id)
                        <span class="label label-danger">{{$tths->name}}</span>
                        @elseif($hs->trangthaihopdong == $tths->id)
                        <span class="label label-primary">{{$tths->name}}</span>
                        @endif 
                      @endforeach
                    </td>
                  </tr>
                  @endforeach
                </tbody></table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
        </div>
        @endif
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
<script src="{{url('public')}}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('public')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="{{url('public')}}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{url('public')}}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{url('public')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('public')}}/dist/js/demo.js"></script>
</body>
</html>
