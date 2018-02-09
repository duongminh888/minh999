<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Member - Login</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
    .xoayimg {
        -webkit-animation:spin 5s linear infinite;
        -moz-animation:spin 5s linear infinite;
        animation:spin 5s linear infinite;
    }
    @-moz-keyframes spin { 100% { -moz-transform: rotate(360deg); } }
    @-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
    @keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }
  </style>
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
<a href="{{url('')}}"><b>Meup</b>68</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name"><!-- John Doe --></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
<img src="{{url('')}}/dist/img/settings.png" alt="User Image" class="xoayimg">
<!-- <img src="{{url('')}}/dist/img/user1-128x128.jpg" alt="User Image"> -->
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" action="{{route('ploginmemsdt')}}" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Nhập số điện thoại" name="sdtmember">
        <div class="input-group-btn">
          <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Nhập số điện thoại để tiếp tục
  </div>
@if ( session()->has('message') )
    <div class="alert alert-warning alert-dismissable" id="ansau3s">
        <i class="fa fa-warning"></i>
        <b>Thông báo!</b> {{ session()->get('message') }}
    </div>
@endif
</div>
<!-- /.center -->
<script type="text/javascript">
  setTimeout(function() {
      $('#ansau3s').fadeOut('fast');
  }, 5000);
</script>
<!-- jQuery 3 -->
<script src="{{url('')}}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
