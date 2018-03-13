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
    #avatar {
      border: solid 4px #ecf0f5;
      border-style: solid;
    }
  </style>
  <!-- Left side column. contains the logo and sidebar -->
@include('teamplte.slidebar') 
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
              <div class="box-tools pull-right">
                <a href="{{url('thanhvien')}}">
                  <button type="button" class="btn-box-tool btn"><i class="fa fa-chevron-left"></i> Thành viên</button>
                </a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive ">
              <form class="form-horizontal" role="form" id="taban2" style="display: block;" method="post" action="{{route('postthemthanhvien')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">
                      Tên đăng nhập
                    </label>
                      <div class="col-sm-8">
                      <input type="text" class="form-control" name="username" placeholder="" value="" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">
                      Mật khẩu
                    </label>
                      <div class="col-sm-8">
                      <input type="password" class="form-control" name="password" placeholder="" value="" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">
                      Họ tên
                    </label>
                      <div class="col-sm-8">
                      <input type="text" class="form-control"  placeholder="" value="" name="hoten">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">
                      Số điện thoại
                    </label>
                      <div class="col-sm-8">
                      <input type="text" class="form-control"  placeholder="" value="" name="sdt">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">
                      Email
                    </label>
                      <div class="col-sm-8">
                      <input type="text" class="form-control"  placeholder="" value="" name="email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">
                      Giới tính
                    </label>
                    <div class="col-sm-8">
                      <select class="form-control" name="gioitinh">
                        <option value="1"
                        >Nam</option>
                        <option value="2" 
                        >Nữ</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">
                      Chức vụ
                    </label>
                    <div class="col-sm-8">
                      <select class="form-control" name="chucvu">
                        @foreach($chucvu as $chucvu)
                        @if($chucvu->id == 1 || $chucvu->id == 4)
                        @else
                        <option value="{{$chucvu->id}}"
                        >{{$chucvu->name}}</option>
                        @endif
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" style="float: right;">Hoàn thành</button>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
<script type="text/javascript">
setTimeout(function() {
    $('#delay3s').fadeOut('fast');
}, 2000);
</script>
@include('teamplte.footer')