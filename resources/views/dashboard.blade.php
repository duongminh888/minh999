@include('teamplte.header')

  <!-- Left side column. contains the logo and sidebar -->
@include('teamplte.slidebar')
  <link rel="stylesheet" href="{{url('public')}}/bower_components/morris.js/morris.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Trang chủ
        <small>Chúc mừng năm mới</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-money"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">TỔNG ĐANG CHO VAY</span>
              <span class="info-box-number">9.000.000.000<small>đ</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-magnet"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">TỔNG LÃI ĐÃ THU</span>
              <span class="info-box-number">2.000.000.000<small>đ</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-times-circle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">TỔNG NỢ XẤU</span>
              <span class="info-box-number">100.000.000<small>đ</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa  fa-envelope-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">TỔNG HỢP ĐỒNG MỚI</span>
              <span class="info-box-number">4</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <div class="row">
        <div class="col-md-6">
          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Lợi nhuận-Cho vay</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="bar-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>   
        <div class="col-md-6">
          <div class="box box-warning">
            <div class="box-header ">
              <h3 class="box-title">Đơn xin vay</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Tên khách hàng</th>
                  <th>Loại hình</th>
                  <th>Địa chỉ</th>
                  <th>Số tiền cần vay</th>
                  <th>Trạng thái</th>
                </tr>
                <tr>
                  <td>Dương Minh</td>
                  <td>Vay trả góp</td>
                  <td>Hà Nội</td>
                  <td>50.000.000đ</td>
                  <td><span class="label label-warning">Chờ duyệt</span></td>
                </tr>
                <tr>
                  <td>Dương Minh</td>
                  <td>Vay trả góp</td>
                  <td>Hà Nội</td>
                  <td>50.000.000đ</td>
                  <td><span class="label label-warning">Chờ duyệt</span></td>
                </tr>
                <tr>
                  <td>Dương Minh</td>
                  <td>Vay trả góp</td>
                  <td>Hà Nội</td>
                  <td>50.000.000đ</td>
                  <td><span class="label label-warning">Chờ duyệt</span></td>
                </tr>
                <tr>
                  <td>Dương Minh</td>
                  <td>Vay trả góp</td>
                  <td>Hà Nội</td>
                  <td>50.000.000đ</td>
                  <td><span class="label label-warning">Chờ duyệt</span></td>
                </tr>
                <tr>
                  <td>Dương Minh</td>
                  <td>Vay trả góp</td>
                  <td>Hà Nội</td>
                  <td>50.000.000đ</td>
                  <td><span class="label label-warning">Chờ duyệt</span></td>
                </tr>
                <tr>
                  <td>Dương Minh</td>
                  <td>Vay trả góp</td>
                  <td>Hà Nội</td>
                  <td>50.000.000đ</td>
                  <td><span class="label label-warning">Chờ duyệt</span></td>
                </tr>
              </table>
            </div>
            <div class="box-footer clearfix" style="margin-top: 10px">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
      <div class="row">
        <div class="container" style="width: 100%">  
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Giao dịch mới nhất</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>#</th>
                  <th>Loại Hình</th>
                  <th>Mã HĐ</th>
                  <th>Người Giao Dịch</th>
                  <th>Khách Hàng</th>
                  <th>Ngày</th>
                  <th>Tình trạng</th>
                  <th>Thu</th>
                  <th>Chi</th>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Vay Lãi</td>
                  <td>ABC</td>
                  <td>Admin</td>
                  <td>Dương Minh</td>
                  <td>8/2/2018 4:52</td>
                  <td><span class="label label-success">Hoàn thành</span></td>
                  <td>9.000.000</td>
                  <td>7.000.000</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Vay Lãi</td>
                  <td>ABC</td>
                  <td>Admin</td>
                  <td>Dương Minh</td>
                  <td>8/2/2018 4:52</td>
                  <td><span class="label label-success">Hoàn thành</span></td>
                  <td>9.000.000</td>
                  <td>7.000.000</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Vay Lãi</td>
                  <td>ABC</td>
                  <td>Admin</td>
                  <td>Dương Minh</td>
                  <td>8/2/2018 4:52</td>
                  <td><span class="label label-success">Hoàn thành</span></td>
                  <td>9.000.000</td>
                  <td>7.000.000</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Vay Lãi</td>
                  <td>ABC</td>
                  <td>Admin</td>
                  <td>Dương Minh</td>
                  <td>8/2/2018 4:52</td>
                  <td><span class="label label-success">Hoàn thành</span></td>
                  <td>9.000.000</td>
                  <td>7.000.000</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Vay Lãi</td>
                  <td>ABC</td>
                  <td>Admin</td>
                  <td>Dương Minh</td>
                  <td>8/2/2018 4:52</td>
                  <td><span class="label label-success">Hoàn thành</span></td>
                  <td>9.000.000</td>
                  <td>7.000.000</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Vay Lãi</td>
                  <td>ABC</td>
                  <td>Admin</td>
                  <td>Dương Minh</td>
                  <td>8/2/2018 4:52</td>
                  <td><span class="label label-success">Hoàn thành</span></td>
                  <td>9.000.000</td>
                  <td>7.000.000</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Vay Lãi</td>
                  <td>ABC</td>
                  <td>Admin</td>
                  <td>Dương Minh</td>
                  <td>8/2/2018 4:52</td>
                  <td><span class="label label-success">Hoàn thành</span></td>
                  <td>9.000.000</td>
                  <td>7.000.000</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Vay Lãi</td>
                  <td>ABC</td>
                  <td>Admin</td>
                  <td>Dương Minh</td>
                  <td>8/2/2018 4:52</td>
                  <td><span class="label label-success">Hoàn thành</span></td>
                  <td>9.000.000</td>
                  <td>7.000.000</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Vay Lãi</td>
                  <td>ABC</td>
                  <td>Admin</td>
                  <td>Dương Minh</td>
                  <td>8/2/2018 4:52</td>
                  <td><span class="label label-success">Hoàn thành</span></td>
                  <td>9.000.000</td>
                  <td>7.000.000</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Vay Lãi</td>
                  <td>ABC</td>
                  <td>Admin</td>
                  <td>Dương Minh</td>
                  <td>8/2/2018 4:52</td>
                  <td><span class="label label-success">Hoàn thành</span></td>
                  <td>9.000.000</td>
                  <td>7.000.000</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Vay Lãi</td>
                  <td>ABC</td>
                  <td>Admin</td>
                  <td>Dương Minh</td>
                  <td>8/2/2018 4:52</td>
                  <td><span class="label label-success">Hoàn thành</span></td>
                  <td>9.000.000</td>
                  <td>7.000.000</td>
                </tr>
              </table>
            </div>
            <div class="box-footer clearfix" >
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- jQuery 3 -->
<!-- jQuery 3 -->
<script src="{{url('public')}}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<!-- Morris.js charts -->
<script src="{{url('public')}}/bower_components/raphael/raphael.min.js"></script>
<script src="{{url('public')}}/bower_components/morris.js/morris.min.js"></script>
<!-- FastClick -->
<script src="{{url('public')}}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<!-- AdminLTE for demo purposes -->
<script src="{{url('public')}}/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    "use strict";

    //BAR CHART
    var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data: [
        {y: '5/2', a: 20000000, b: 9000000},
        {y: '6/2', a: 5000000, b: 7000000},
        {y: '7/2', a: 50000000, b: 10000000},
        {y: '8/2', a: 35000000, b: 15000000},
        {y: '9/2', a: 40000000, b: 20000000},
      ],
      barColors: ['#00a65a', '#f56954'],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['Cho Vay', 'Lợi Nhuận'],
      hideHover: 'auto'
    });
  });
</script>
  <!-- /.content-wrapper -->
@include('teamplte.footer')