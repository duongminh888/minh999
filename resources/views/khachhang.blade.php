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
    td {
      width: 50%;
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
        <div class="col-md-6">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Thông tin khách hàng</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive" id="taban3">
                <table class="table table-hover">
                  <tbody>
                    <thead>
                      <th>#</th>
                      <th>Họ tên</th>
                      <th>Số điện thoại</th>
                      <th></th>
                    </thead>
                    @foreach($member as $member)
                    <tr>
                      <td style="width: 5%">{{$member->id}}</td>
                      <td style="width: 30%"><a href="{{url('chitietkhachhang')}}/{{$member->id}}">{{$member->hoten}}</a></td>
                      <td style="width: 30%">{{$member->sdt}}</td>
                      <td style="width: 80px;text-align: right;"><a href="{{url('chitietkhachhang')}}/{{$member->id}}">Chi tiết</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
<script type="text/javascript"></script>
@include('teamplte.footer')
