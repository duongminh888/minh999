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
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
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
                  <th>Loại hình</th>
                  <th style="text-align: right;">Số tiền cần vay</th>
                  <th style="text-align: center;">Số ngày vay</th>
                  <th style="text-align: center;">Trạng thái</th>
                  <th style="text-align: center;">Đã vay</th>
                  <th style="text-align: center;">Thời gian</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($hoso as $hs)
                <tr>
                  <td>{{$hs->id}}</td>
                  @foreach($member as $mb)
                  @if($hs->idmember == $mb->id)
                  <td>
                    <a href="#">{{$mb->hoten}}</a>
                  </td>
                  <td>{{$mb->sdt}}</td>
                  @endif
                  @endforeach
                  <td>Vay trả góp</td>
                  <td style="text-align: right;"><?= number_format($hs->sotienvay,0,",","."); ?> <b> đ</b></td>
                  <td style="text-align: center;">{{$hs->songay}}</td>
                  <td style="text-align: center;">
                  <?php $checktrangthai=0; ?>
                  @foreach($ttkh as $ttkh)
                  @if($mb->id ==$ttkh->idmember)
                  <?php $checktrangthai++; ?>
                  @endif 
                  @endforeach
                      @if($hs->trangthaihopdong == 1)
                      <span class="label label-warning">Chờ duyệt</span>
                      @elseif($hs->trangthaihopdong == 2)
                      <span class="label label-primary">Đã giải ngân</span>
                      @elseif($hs->trangthaihopdong == 3)
                      <span class="label label-success">Hoàn thành</span>
                      @endif 
                  <td style="text-align: center;">
                    Lần {{$hs->stt}}
                  </td>
                  <td style="text-align: center;">{{$hs->created_at}}</td>
                  <th>
                    <a href="{{url('hoadon')}}/{{$hs->id}}">
                      <button type="button" class="btn btn-block btn-default">Chi tiết</button>
                    </a>
                  </th>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Tên khách hàng</th>
                  <th>Số điện thoại</th>
                  <th>Loại hình</th>
                  <th style="text-align: right;">Số tiền cần vay</th>
                  <th style="text-align: center;">Số ngày vay</th>
                  <th style="text-align: center;">Trạng thái</th>
                  <th style="text-align: center;">Thời gian</th>
                  <th>
                  </th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
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