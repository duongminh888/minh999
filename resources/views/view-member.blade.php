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
      <div class="row">
        <div class="col-md-12">
            <div class="box">
              @foreach
              <div class="box-header">
                <h3 class="box-title">Thông tin khách hàng: </h3>
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
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@include('teamplte.footer')