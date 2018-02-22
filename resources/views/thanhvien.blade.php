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
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Thông tin user: </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-striped">
                <tbody >
                  <tr>
                    <th></th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Chức vụ</th>
                    <th style="width: 100px">#</th>
                  </tr>
                  <tr>
                    <td><img src="{{url('')}}/dist/img/user2-160x160.jpg" width="70" height="70"></td>
                    <td style="padding-top: 30px"><b>admin</b></td>
                    <td style="padding-top: 30px">minhproooo1@yahoo.com</td>
                    <td style="padding-top: 30px"><span class="label label-success">Admintrator</span></td>
                    <td style="padding-top: 30px">
                      <a href="#">
                        <i class="fa fa-edit" style="font-size: 22px;color: red"></i> 
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td><img src="{{url('')}}/dist/img/user2-160x160.jpg" width="70" height="70"></td>
                    <td style="padding-top: 30px"><b>gdtang5</b></td>
                    <td style="padding-top: 30px">minh_coi_888@yahoo.com</td>
                    <td style="padding-top: 30px"><span class="label label-primary">Giám đốc</span></td>
                    <td style="padding-top: 30px">
                      <a href="#">
                        <i class="fa fa-edit" style="font-size: 22px;color: red"></i> 
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td><img src="{{url('')}}/dist/img/user2-160x160.jpg" width="70" height="70"></td>
                    <td style="padding-top: 30px"><b>nhanvien1</b></td>
                    <td style="padding-top: 30px">minhsiunhonm@gmail.com</td>
                    <td style="padding-top: 30px"><span class=" label label-warning ">Nhân viên</span></td>
                    <td style="padding-top: 30px">
                      <a href="#">
                        <i class="fa fa-edit" style="font-size: 22px;color: red"></i> 
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-md-6">
            <!-- <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Thông tin khách hàng: </h3>
              </div>
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <th>Họ tên khách hàng</th>
                      <th>Dương Văn Minh</th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div> -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@include('teamplte.footer')