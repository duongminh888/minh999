@include('teamplte.header')
  <!-- DataTables -->
  <style type="text/css">
    #example1_filter {
      float: right;
    }
    #example1_paginate {
      text-align: right;
    }
    #example1_paginate .pagination {
      margin: 0px;
    }
  </style>
  <!-- Left side column. contains the logo and sidebar -->
@include('teamplte.slidebar')
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Đơn xin vay
        <small>Chúc mừng năm mới</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    @if(Auth::user()->rule == 7)
      <div class="row">
        <div class="col-md-12">
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">Đơn xin vay</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Tên khách hàng</th>
                  <th>Số điện thoại</th>
                  <th>Chứng minh thư</th>
                  <th style="text-align: right;">Số tiền cần vay</th>
                  <th style="text-align: center;">Số ngày vay</th>
                  <th style="text-align: center;">Trạng thái</th>
                  <th style="text-align: center;">Thời gian</th>
                </tr>
                </thead>
                <tbody>
                @foreach($shophoso as $shophs)
                <tr>
                  <td>{{$shophs->id}}</td>
                  <td>
                    {{$shophs->hoten}}
                  </td>
                  <td>{{$shophs->sdt}}</td>
                  <td>{{$shophs->cmt}}</td>
                  <td style="text-align: right;"><?= number_format($shophs->sotienvay,0,",","."); ?> <b> đ</b></td>
                  <td style="text-align: center;">{{$shophs->songay}}</td>
                  <td style="text-align: center;">
                    @foreach($trangthaihoso as $tths)
                      @if($shophs->trangthaihopdong == 1 && $shophs->trangthaihopdong == $tths->id)
                      <span class="label label-warning">{{$tths->name}}</span>
                      @elseif($shophs->trangthaihopdong == 2 && $shophs->trangthaihopdong == $tths->id)
                      <span class="label label-success">{{$tths->name}}</span>
                      @elseif($shophs->trangthaihopdong == 5 && $shophs->trangthaihopdong == $tths->id)
                      <span class="label label-danger">{{$tths->name}}</span>
                      @elseif($shophs->trangthaihopdong == $tths->id)
                      <span class="label label-primary">{{$tths->name}}</span>
                      @endif 
                    @endforeach
                  <td style="text-align: center;">{{substr($shophs->created_at,0,10)}}</td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
    @else
      <div class="callout callout-danger">
        <h4>Lỗi!</h4>

        <p>Trang web này dành riêng cho tài khoản shop.</p>
      </div>
    @endif
    </section>
    <!-- /.content -->
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Dương Văn Minh</strong>
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{url('')}}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="{{url('')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{url('')}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="{{url('')}}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{url('')}}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{url('')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('')}}/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>
</body>
</html>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">